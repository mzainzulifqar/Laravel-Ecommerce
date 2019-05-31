
  const client = algoliasearch('YQW6QANEG7', '8a28928d36e3d1621c817bea66b1f522');
const index = client.initIndex('title');


autocomplete('#aa-search-input', {}, [
    {
      source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
      displayKey: 'name',
      templates: {
        header: '<div class="aa-suggestions-category">Products</div>',
        suggestion({_highlightResult}) {
          // return `<span>${_highlightResult.slug.value}</span>
          // <span>${_highlightResult.price.value}</span><br>
          // <span>${_highlightResult.price.value}</span>`;

          const markup = `<div class="alogila-result">
          <img src="${window.location.origin}/ecommerce/public/images/${_highlightResult.thumbnail.value}" alt="" />
          <span>${_highlightResult.slug.value}</span>
          <span>${_highlightResult.price.value}</span>
          
         </div>
          
          
         `;
          return markup;
        }
       
        
      


                  },

      
    }
   
    
]).on('autocomplete:selected', function(event, suggestion, dataset) {
  // var url;
  // if (suggestion.url === window.location.pathname) {
  //   var target = $('#' + suggestion.k_page_hash);
  //   if (target.length > 0) {
  //     $('html, body').stop().animate(
  //       {
  //         scrollTop: target.offset().top - 60
  //       },
  //       0
  //     );
  //   }
  // }
  // if (suggestion.k_type === 'heading') {
  //   url = suggestion.url;
  // } else {
  //   var hash = suggestion.k_page_hash || '';
  //   url = suggestion.url + '#sts=' + hash;
  // }

  window.location.href = window.location.origin +'/ecommerce/Product/'+suggestion.slug;
}).on('keyup',function(event)
{
  if(event.keyCode == 13)
  {
    window.location.href = window.location.origin +'/ecommerce/product/shop';
  }
});
