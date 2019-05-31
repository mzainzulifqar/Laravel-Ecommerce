const searchClient = algoliasearch('YQW6QANEG7', '7b43c8e418297921083e1e5de728c55e');

const search = instantsearch({
  indexName: 'title',
  searchClient,
});
// Search box
search.addWidget(
  instantsearch.widgets.searchBox({
    container: '#searchbox',
  })
);
// Displaying results
search.addWidget(
  instantsearch.widgets.hits({
    container: '#hits',
    templates:{
      empty : "<h2 class='text-center'>No Results</h2>",
      item: function(item){
        return `<div class="" style="text-align:center;">
                                
                                                <img class="front" style="width:183px;height:268px;item-align:center;display: inline-block" src="${window.location.origin}/ecommerce/public/images/${item._highlightResult.thumbnail.value}" alt="">
                                                
                                            <a href="${window.location.origin+'/ecommerce/Product/'+item._highlightResult.slug.value}"><p>${item._highlightResult.slug.value}</p></a>
                                            <p style="color:red;display:inline;padding-right:12px;"><del>$${item._highlightResult.price.value}</del></p>
                                            <p style="color:black;display:inline;">$${item._highlightResult.discount_price.value}</p>
                                             <a style="font-size:24px;display:block;" href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                            </div>`;

      },

    }
  })
);
// pagination
search.addWidget(
instantsearch.widgets.pagination({
  container: '#pagination',
  totalPages: 10,
  padding: 2,
  scrollTo: false,
})
);

// Status
search.addWidget(
  instantsearch.widgets.stats({
  container: '#stats',
})


  );
// Price Range
search.addWidget(
    instantsearch.widgets.rangeSlider({
  container: '#range-slider',
  attribute: 'price',
  min: 0,
   max: 100000,
   
})

  );
// Refinement List
search.addWidget(
  instantsearch.widgets.refinementList({
  container: '#refinement-list',
  attribute: 'category',
})

  );

// Clear filters
search.addWidget(
  instantsearch.widgets.clearRefinements({
  container: '#clear-refinements',
})


  );


search.start();
