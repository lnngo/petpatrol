module.exports = function(grunt) {
	
	grunt.initConfig({

	    bower_concat: {
    		all: {
    			dest: {
    				'js': 'components/js/_bower.js'
    			}
      		}
		}, // bower-concat

    	sass: {
      		dist: {
        		files: {
          			'components/css/bootstrap.css': 'bower_components/bootstrap/scss/bootstrap.scss'
        		}
      		}
    	}, // sass

		concat : {
			options : {
				js: {
					separator : '\n\n//---x---x--x---x--- \n',
					banner : '\n\n // --- petpatrol.ca ---\n'
				}
			},
			js: {
				src: ['components/js/*.js'],
				dest: 'themes/petpatrol/js/scripts.js'
			},
			css: {
				src: ['components/css/*.css'],
				dest: 'themes/petpatrol/css/style.css'
			}
		}, // concat

		sync: {
			main: {
				files : [{
					cwd: "themes/petpatrol/",
					src: ['**'],
					dest: 'build/wp-content/themes/petpatrol/'
				}]
			}
		}, // sync

		copy: {
			sass: {
				files: [{src: 'components/scss/_custom.scss', dest: 'bower_components/bootstrap/scss/_custom.scss'}]
			}

		} //copy


	}); // initConfig

	grunt.loadNpmTasks('grunt-bower-concat');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-sync');
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-copy');

	grunt.registerTask('default', ['bower_concat', 'copy:sass', 'sass', 'concat', 'sync']);
	

}; // wrapper function