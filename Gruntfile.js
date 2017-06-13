module.exports = function(grunt){

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),



		pug: 
			{
			  compile: {
			    options: {
			      data: {
			        debug: false
			      }
			    },
			    
			    files: {
			      'by.html':['dev/by.pug']
			    },
			    files: {
			      'index.html': ['dev/index.pug']
			    },
			    files: {
			      'en.html': ['dev/en.pug']
			    },
			    files: {
			      'pl.html': ['dev/pl.pug']
			    },
			  }
			},

		less: 
			{

			  production: {
			    options: 
				    {
				      paths: ['dev/css'],
				      plugins: 
				      	[
				        new (require('less-plugin-autoprefix'))({browsers: ["last 3 versions"]})
				        ,new (require('less-plugin-clean-css'))()
				        ],
				    },
			    files: 
				    {
				      'dev/css/custom.css': 'dev/css/custom.less'
				    }
			  }
			},

		concat: 
			{
				dist:
					{
						src:['dev/css/custom.css'],
						dest:'dev/css/concat.css'
					}
  			},	

		watch:
			{
				css:
				{
					files:['dev/css/custom.less', 'dev/css/colors.less', 'dev/css/media-queries.less'],
					tasks:['less', 'concat'],
					options: {
				      livereload: true,
				    }
				},
				scripts:
				{
					files:['dev/index.pug','dev/by.pug', 'dev/en.pug','dev/pl.pug'],
					tasks:['pug'],
					options: {
				      livereload: true,
				    }
					
				}
			},

		browserSync: 
			{
	            dev: {
	                bsFiles: {
	                    src : [
                        'dev/css/*.css',
                        '*.html'
                    ]
	                },
	                options: {
	                    watchTask: true,
	                    proxy: 'sauko.local'
	                }
	            }
	        }	

	}); //end .initConfig

	grunt.loadNpmTasks('grunt-contrib-pug');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-browser-sync');

	grunt.registerTask('default',['pug','less','concat','watch'])


}; //end wrap