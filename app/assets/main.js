// ------ jquery and bootstrap basics ------
// create global $ and jQuery variables
const $ = require('jquery');
global.$ = global.jQuery = $;

require('jquery-ui');
require('bootstrap-sass');
require('jquery-slimscroll');
require('bootstrap-select');

// ------ AdminLTE framework ------
require('./adminlte/admin-lte.scss');
require('admin-lte/dist/css/AdminLTE.min.css');
require('admin-lte/dist/css/skins/_all-skins.css');
require('./adminlte/admin-lte-extensions.scss');
require('./userfrosting/css/userfrosting.css');

global.$.AdminLTE = {};
global.$.AdminLTE.options = {};
require('admin-lte/dist/js/adminlte.min');
require('./adminlte/AdminLTE-custom');

// ------ Other dependencies ------
const Handlebars = require("handlebars/dist/handlebars");
global.Handlebars = Handlebars;
require('jquery-validation');
require("jquery-validation/dist/additional-methods.js")
require('jquery-slimscroll');
require('icheck');
require('icheck/skins/square/blue.css');
require('fastclick');
require('select2/dist/js/select2.full.js');
require('select2/dist/css/select2.css');
require('daterangepicker');

const Moment = require('moment');
global.moment = Moment;

// ------ Global scripts ------
require('./userfrosting/js/fortress-jqueryvalidation-methods');
require('./userfrosting/js/attrchange');
require('./userfrosting/js/uf-alerts');
require('./userfrosting/js/uf-form');
require('./userfrosting/js/uf-modal');
require('./userfrosting/js/uf-copy');
require('./userfrosting/js/uf-init');
