<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
								
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script src="{{URL::to('js/main.js')}}"></script>
				
        <title>@yield('title')</title>

        <style>
            span.match{
                background-color:#f8dda9;
                border:1px solid #edd19b;
                margin:-1px;
                color:#390705;
            }
        </style>
    </head>
    <body>
        @section('sidebar')								
        @show

        <div class="container">
		<div class="jumbotron">
			<h1 class="display-6">Уроци лого</h1>
		</div>
												
            @yield('content')
        </div>

        <script>
            $(function() {

            var search = $('#video-search'),
                content = $('#video-list'),
                matches = $(), index = 0;

            // Listen for the text input event
            search.on('input', function(e) {
                // Only search for strings 3 characters or more
                if (search.val().length >= 3) {                    
                    // Use the highlight plugin
                    content.highlight(search.val(), function(found) {                
                        found.parent().parent().css('background','yellow');
                    });
                }
                else {
                    content.highlightRestore();
                }

            });

            });

            (function($) {
            var termPattern;
            $.fn.highlight = function(term, callback) {
                return this.each(function() {
                    var elem = $(this);
                    if (!elem.data('highlight-original')) {                        
                        // Save the original element content
                        elem.data('highlight-original', elem.html());                        
                    } else {                        
                        // restore the original content
                        elem.highlightRestore();                        
                    }

                    termPattern = new RegExp('(' + term + ')', 'ig');
                    // Search the element's contents
                    walk(elem);

                    // Trigger the callback
                    callback && callback(elem.find('.match'));

                });
            };

            $.fn.highlightRestore = function() {                
                return this.each(function() {
                    var elem = $(this);
                    elem.html(elem.data('highlight-original'));
                });
                
            };

            function walk(elem) {
                elem.contents().each(function() {
                    if (this.nodeType == 3) { // text node
                        if (termPattern.test(this.nodeValue)) {
                            $(this).replaceWith(this.nodeValue.replace(termPattern, '<span class="match">$1</span>'));
                        }
                    } else {
                        walk($(this));
                    }
                });
            }

            })(jQuery); 
        </script>
    </body>
</html>

