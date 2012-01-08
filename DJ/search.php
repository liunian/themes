<?php
/**
 * Template Name: Search
 */
?>

<?php
 /**
 * The template for displaying Search Results pages.
 *http://www.google.com/cse
 * @package WordPress
 * @subpackage DJ
 * @since DJ 0.1
 */

get_header(); ?>

<div id="cse" style="width: 100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  function parseQueryFromUrl () {
    var queryParamName = "q";
    var search = window.location.search.substr(1);
    var parts = search.split('&');
    for (var i = 0; i < parts.length; i++) {
      var keyvaluepair = parts[i].split('=');
      if (decodeURIComponent(keyvaluepair[0]) == queryParamName) {
        return decodeURIComponent(keyvaluepair[1].replace(/\+/g, ' '));
      }
    }
    return '';
  }

  google.load('search', '1', {language : 'zh-CN', style : google.loader.themes.SHINY});
  google.setOnLoadCallback(function() {
    var customSearchOptions = {};
  
    var imageSearchOptions = {};
    imageSearchOptions['layout'] = google.search.ImageSearch.LAYOUT_POPUP;
    customSearchOptions['enableImageSearch'] = true;
    customSearchOptions['imageSearchOptions'] = imageSearchOptions;
  
    var customSearchControl = new google.search.CustomSearchControl(
      '010809034132572699668:69nzlkcq1w4', customSearchOptions);

    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    var options = new google.search.DrawOptions();
    options.setAutoComplete(true);
   // options.enableSearchResultsOnly(false); // not show input form
    customSearchControl.draw('cse', options);
    var queryFromUrl = parseQueryFromUrl();
    if (queryFromUrl) {
      customSearchControl.execute(queryFromUrl);
    }
  }, true);
</script>
 


<?php get_footer(); ?>
