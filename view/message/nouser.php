<!DOCTYPE html>
                    <html>
                    <head>
                        <!-- Bootstrap CSS -->
                        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
                    </head>
                    <body>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='errorModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>Error</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        No user found with this email.
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-primary' onclick='redirectToHome()'>OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Bootstrap JS, Popper.js, and jQuery -->
                        <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
                        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
                        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
                        <script>
                            function showErrorModal() {
                                $('#errorModal').modal('show');
                            }
            
                            function redirectToHome() {
                                window.location.href = '/';
                            }
            
                            // Show the modal on page load
                            $(document).ready(function() {
                                showErrorModal();
                            });
                        </script>
                    </body>
                    </html>";