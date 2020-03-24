var ias = jQuery.ias({
  container: 'main',
  item: 'article',
  pagination: '.pagination',
  next: '.next',
  negativeMargin: 4000,
});

ias.extension(new IASPagingExtension())
