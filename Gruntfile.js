
module.exports = function(grunt) {
  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: false,
          yuicompress: true,
          optimization: 2,
          sourceMap: true,
          sourceMapFilename: 'style.css.map', // where file is generated and located
          sourceMapURL: 'style.css.map', // the complete url and filename put in the compiled css file
          //sourceMapBasepath: 'css', // Sets sourcemap base path, defaults to current working directory.
          //sourceMapRootpath: 'css' // adds this path onto the sourcemap filename and less file paths
        },
        files: {
          // target.css file: source.less file
          "style.css": "library/less/theme-betterplace-lab.less"
        }
      }
    },
    concat: {
      js: {
        src: ['library/scripts/bootstrap.js','library/scripts/documentready.js'],
        dest: 'library/js/lab-theme.js'
      }
    },
   uglify: {
        dist: {
          src: 'library/js/lab-theme.js',
          dest: 'library/js/lab-theme.min.js'
        }
    },


    watch: {
      styles: {
        files: ['library/less/**/*.less'], // which files to watch
        tasks: ['less'],
        options: {
          livereload: true,
          nospawn: true
        }
      },
       scripts: {
        files: ['library/scripts/**/*.js'],
        tasks: ['concat']
      }
    }
  });
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.registerTask('default', ['watch']);
};