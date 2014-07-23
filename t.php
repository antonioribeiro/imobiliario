var page = require('webpage').create();
page.open('http://development.imobiliar.io/', function() {
  page.render('example.png');
  phantom.exit();
});