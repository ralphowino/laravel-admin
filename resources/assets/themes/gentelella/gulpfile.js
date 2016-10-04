module.exports = function (mix) {
    var themePath = '../themes/gentelella';
    var vendorPath = '../vendor';

    mix
        .scripts([
            `${vendorPath}/fastclick/lib/fastclick.js`,
            `${vendorPath}/nprogress/nprogress.js`,
            `${vendorPath}/Chart.js/dist/Chart.min.js`,
            `${vendorPath}/gauge.js/dist/gauge.min.js`,
            `${vendorPath}/bootstrap-progressbar/bootstrap-progressbar.min.js`,
            `${vendorPath}/iCheck/icheck.min.js`,
            `${vendorPath}/skycons/skycons.js`,
            `${vendorPath}/Flot/jquery.flot.js`,
            `${vendorPath}/Flot/jquery.flot.pie.js`,
            `${vendorPath}/Flot/jquery.flot.time.js`,
            `${vendorPath}/Flot/jquery.flot.stack.js`,
            `${vendorPath}/Flot/jquery.flot.resize.js`,
            `${vendorPath}/flot.orderbars/js/jquery.flot.orderBars.js`,
            `${vendorPath}/flot-spline/js/jquery.flot.spline.min.js`,
            `${vendorPath}/flot.curvedlines/curvedLines.js`,
            `${vendorPath}/DateJS/build/date.js`,
            `${vendorPath}/jqvmap/dist/jquery.vmap.js`,
            `${vendorPath}/jqvmap/dist/maps/jquery.vmap.world.js`,
            `${vendorPath}/jqvmap/examples/js/jquery.vmap.sampledata.js`,

            `${themePath}/js/moment/moment.min.js`,
            `${themePath}/js/datepicker/daterangepicker.js`,
            `${themePath}/js/custom.min.js`
        ], 'public/js/gentelella.js')
        .styles([
            `${vendorPath}/nprogress/nprogress.css`,
            `${vendorPath}/iCheck/skins/flat/green.css`,
            `${vendorPath}/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css`,
            `${vendorPath}/jqvmap/dist/jqvmap.min.css`,
            `${vendorPath}/jqvmap/dist/jqvmap.min.css`,

            `${themePath}/css/custom.min.css`,
        ], 'public/css/gentelella.css')
        .copy(`resources/assets/themes/gentelella/images`, 'public/images')
        .copy(`resources/assets/vendor/iCheck/skins/flat/green.png`, 'public/css');

};