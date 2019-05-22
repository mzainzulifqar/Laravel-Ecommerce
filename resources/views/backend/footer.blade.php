
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

     <script src="{{asset('public/theme/js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/theme/plugin/dist/js/select2.min.js')}}"></script>

	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
	
	@yield('scripts')
	<script>
		$(document).ready(function() {

				//Slug Js
				$("#txttitle").keyup(function(){
				    var Text = $(this).val();
					// var siteurl = "https://localhost/ecom/";
				    var result = convertToSlug(Text);

				    $("#url").text(result); 
				    $("#slug").val(result);
				
				
			});
				


			function convertToSlug(Text)
				{
				    return Text
				        .toLowerCase()
				        .replace(/ /g,'-')
				        .replace(/[^\w-]+/g,'')
				        ;
				}

				//Select2 JS

		    $('.js-example-basic-multiple').select2();

		    $(".js-example-responsive").select2({
    			width: 'resolve' // need to override the changed default
			});

		$(".js-example-placeholder-multiple").select2({
			    placeholder: "Select a parent Category"
			});
		

				//CKEDITIOR JS

                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

                                });
               	</script>
     

       
  </body>
</html>