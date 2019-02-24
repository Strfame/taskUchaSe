<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            span.match{
                background-color:#f8dda9;
                border:1px solid #edd19b;
                margin:-1px;
                color:#390705;
            }
        </style>


        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>   
        <div class="container">     
            <div>
                Laravel
            </div>

            <div class="alert alert-primary" role="alert">
                A simple primary alert—check it out!
            </div>



            <button type="button" class="btn btn-secondary">Secondary</button>




            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="form-group">
                <label for="search">Email address</label>
                <input type="text" class="form-control" id="video-search" placeholder="search..">
            </div>

            <div id="video-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>   

        


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>        
        
        <script>
            $(function() {

            var search = $('#video-search'),
                content = $('#video-list'),
                matches = $(), index = 0;

            // Listen for the text input event
            search.on('input', function(e) {
                // Only search for strings 1 characters or more
                if (search.val().length >= 1) {                    
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
