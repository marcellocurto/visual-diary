let ias = new InfiniteAjaxScroll('main', {
  item: 'article',
  next: '.next',
  pagination: '.pagination',
  negativeMargin: 1000,
  logger: false
});

ias.on('page', (event) => {
  let state = history.state;
  history.replaceState(state, event.title, event.url);
  console.log(state, event.title, event.url);
  
});