'use strict';

module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({

		// Load grunt project configuration
		pkg: grunt.file.readJSON('package.json'),
        deployTargetLocal: 'C:/xampp/htdocs/wp-moumoutestcontent/wp-content/themes/moumou-milk-theme',

		sass: {
			build: {
                options: {
                  sourcemap: 'none'
                },
				files: {
					'style.css' : 'style.scss',
				}
			},
		},

        // Create a .pot file
		makepot: {
			build: {
				options: {
					domainPath: 'languages',
					potHeaders: {
	                    poedit: true,
	                    'x-poedit-keywordslist': true
	                },
					processPot: function( pot, options ) {
						pot.headers['report-msgid-bugs-to'] = 'https://';
						return pot;
					},
					type: 'wp-plugin',
				},
                files: [
					{
						src: [
							'*.php',
						],
					}
				]

			}
		},
        copy: {
            build: {
                files: [{
                    expand: true,
                    cwd: './',
                    src: [
                        '*.php',
                        'style.css',
                        'editor-style.css',
                        'readme.txt',
                        'screenshot.png',
                        'languages/**/*',
                        'assets/**/*',
                        '!assets/js/src',
                        '!assets/js/src/**/*',
                        '!assets/sass',
                        '!assets/sass/**/*'
                    ],
                    dest: 'build/'
                }],
            },
            deployphp: {
                expand: true,
                cwd: './',
                src: [
                    '*.php'
                ],
                dest: '<%= deployTargetLocal %>/'
            },
            deploycss: {
                files: [{
                    expand: true,
                    cwd: './',
                    src: ['style.css', 'editor-style.css'],
                    dest: '<%= deployTargetLocal %>/'
                }],
            },
            deployother: {
                files: [{
                    expand: true,
                    cwd: './',
                    src: [
                        'readme.txt',
                        'screenshot.png',
                        'languages/**/*',
                        'assets/**/*',
                        '!assets/js/src',
                        '!assets/js/src/**/*',
                        '!assets/sass',
                        '!assets/sass/**/*'
                    ],
                    dest: '<%= deployTargetLocal %>/'
                }]
            }
        },

		// Build a package for distribution
		compress: {
			main: {
				options: {
					archive: 'moumou-milk-theme-<%= pkg.version %>.zip'
				},
				files: [
					{
						src: [
							'*', '**/*',
							'!moumou-milk-theme-<%= pkg.version %>.zip',
							'!.*', '!Gruntfile.js', '!package.json', '!package-lock.json','!node_modules', '!node_modules/**/*','!.sass-cache', '!.sass-cache/**/*',
							'!assets/css/less', '!assets/css/less/**/*',
							'!assets/js/src', '!assets/js/src/**/*',
						],
						dest: '/moumou-milk-theme',
					}
				]
			}
		}

	});

    grunt.registerTask('build', 'Builds the project', function() {

        //grunt.loadNpmTasks('grunt-contrib-sass');
        grunt.loadNpmTasks('sass');		
        grunt.loadNpmTasks('grunt-wp-i18n');
        grunt.loadNpmTasks('grunt-contrib-copy');

        grunt.task.run(
            'sass',
            'makepot:build',
            'copy:build'
        );
    });

    grunt.registerTask('quickbuild', 'Same as build', function() {

        grunt.loadNpmTasks('grunt-contrib-sass');
        grunt.loadNpmTasks('sass');				
        grunt.loadNpmTasks('grunt-wp-i18n');
        grunt.loadNpmTasks('grunt-contrib-copy');
        grunt.loadNpmTasks('grunt-newer');

        grunt.task.run(
            'newer:sass',
            'newer:makepot:build',
            'newer:copy:build'
        );
    });

    grunt.registerTask('deploylocal', 'build and deploy to test server', function() {

        grunt.loadNpmTasks('grunt-contrib-copy');
        grunt.loadNpmTasks('grunt-newer');

        grunt.task.run(
            'quickbuild',
            'newer:copy:deployphp',
            'newer:copy:deploycss',
            'newer:copy:deployother',

        );
    });

};
