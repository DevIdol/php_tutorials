            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#selectAllBoxes').click(function(){
                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked=true;
                    })
                }else{
                    $('.checkBoxes').each(function(){
                        this.checked=false;
                    })
                }
            })
        })
    
</script>
</body>

</html>
