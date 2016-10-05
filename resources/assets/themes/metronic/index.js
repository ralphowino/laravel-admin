module.exports = function (mix) {
    var themePath = '../themes/metronic';
    var vendorPath = '../vendor';
    var nodePath = '../../../node_modules';

    mix
        .scripts([
            `${vendorPath}/js.cookie.min.js`,
            `${vendorPath}/slimScroll/jquery.slimscroll.min.js`,
            `${vendorPath}/jquery.blockui.min.js`,
            `${vendorPath}/bootstrap-switch/js/bootstrap-switch.min.js`,
            `${vendorPath}/moment.min.js`,
            `${vendorPath}/daterangepicker/daterangepicker.js`,
            `${vendorPath}/morrisjs/morris.js`,
            `${vendorPath}/raphael/raphael.min.js`,
            `${vendorPath}/counterup/jquery.waypoints.min.js`,
            `${vendorPath}/counterup/jquery.counterup.min.js`,
            `${vendorPath}/amcharts/amcharts/amcharts.js`,
            `${vendorPath}/amcharts/amcharts/serial.js`,
            `${vendorPath}/amcharts/amcharts/pie.js`,
            `${vendorPath}/amcharts/amcharts/radar.js`,
            `${vendorPath}/amcharts/amcharts/radar.js`,
            `${vendorPath}/amcharts/amcharts/themes/patterns.js`,
            `${vendorPath}/amcharts/amcharts/themes/chalk.js`,
            `${vendorPath}/amcharts/ammap/ammap.js`,
            `${vendorPath}/amcharts/ammap/maps/js/worldLow.js`,
            `${vendorPath}/amcharts/amstockcharts/amstock.js`,
            `${vendorPath}/fullcalendar/fullcalendar.min.js`,
            `${vendorPath}/horizontal-timeline/horozontal-timeline.min.js`,
            `${vendorPath}/Flot/jquery.flot.js`,
            `${vendorPath}/flot/jquery.flot.resize.min.js`,
            `${vendorPath}/flot/jquery.flot.categories.min.js`,
            `${vendorPath}/jquery-easypiechart/jquery.easypiechart.min.js`,
            `${vendorPath}/sparkline/jquery.sparkline.min.js`,
            `${vendorPath}/jqvmap/jqvmap/jquery.vmap.js`,
            `${vendorPath}/jqvmap/jqvmap/maps/jquery.vmap.russia.js`,
            `${vendorPath}/jqvmap/jqvmap/maps/jquery.vmap.world.js`,
            `${vendorPath}/jqvmap/jqvmap/maps/jquery.vmap.europe.js`,
            `${vendorPath}/jqvmap/jqvmap/maps/jquery.vmap.germany.js`,
            `${vendorPath}/jqvmap/jqvmap/maps/jquery.vmap.usa.js`,
            `${vendorPath}/jqvmap/jqvmap/data/jquery.vmap.sampledata.js`,

            `${themePath}/js/app.min.js`,
            `${themePath}/pages/scripts/dashboard.min.js`,
            `${themePath}/layouts/layout/scripts/layout.min.js`,
            `${themePath}/layouts/layout/scripts/demo.min.js`,
            `${themePath}/layouts/global/scripts/quick-sidebar.min.js`
        ], 'public/js/metronic.js')

        .styles([
            `${vendorPath}/simple-line-icons/simple-line-icons.min.css`,
            `${vendorPath}/bootstrap-switch/css/bootstrap-switch.min.css`,
            `${vendorPath}/daterangepicker/daterangepicker.css`,
            `${vendorPath}/morris/morris.css`,
            `${vendorPath}/fullcalendar/fullcalendar.min.css`,
            `${vendorPath}/jqvmap/jqvmap/jqvmap.css`,

            `${themePath}/css/components.min.css`,
            `${themePath}/css/plugins.min.css`,
            `${themePath}/layouts/layout/css/layout.min.css`,
            `${themePath}/layouts/layout/css/themes/darkblue.min.css`,
            `${themePath}/layouts/layout/css/custom.min.css`
        ], 'public/css/metronic.css')
        .copy(`resources/assets/themes/metronic/img`, 'public/img/metronic/')
        .copy(`resources/assets/themes/metronic/pages/img`, 'public/img/metronic/pages/img')
        .copy(`resources/assets/themes/metronic/pages/media`, 'public/img/metronic/pages/media');

    ['global', 'layout', 'layout1', 'layout2', 'layout3', 'layout4', 'layout5']
        .forEach(function (layout) {
            mix.copy(`resources/assets/themes/metronic/layouts/${layout}/img/`, `public/img/metronic/${layout}/`);
        })
};