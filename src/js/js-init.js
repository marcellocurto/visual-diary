var ias = jQuery.ias({
  container: 'main',
  item: 'article',
  pagination: '.pagination',
  next: '.next',
  negativeMargin: 1900,
});

ias.extension(new IASPagingExtension());

ias.extension(new IASHistoryExtension({
  prev: '.previous',
}));
