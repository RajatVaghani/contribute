    <footer class="footer">
      <div class="container">
	  	<br/>
        <p>&copy; Cyber Sky</p>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Submit your contribution</h4>
                </div>
                <form class="form" action="submit.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="email" name="email" value="" class="form-control" placeholder="Enter email address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="code" value="" class="form-control" placeholder="Code (if any)">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn fillbtn" onclick="submit()" style="
                        width: 130px;
                        height: auto;
                        padding: 5px;
                        ">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
