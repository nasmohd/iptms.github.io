<?php
    include '../phpIncludes/header.php';
    
    $get_IPT = mysqli_query ($conn, "SELECT * FROM ipt_place_info");
    $getMAX_IPT = mysqli_query ($conn, "SELECT MAX(IPTplace_id) AS max_ipt FROM ipt_place_info");
    $get_IPT_res = mysqli_fetch_assoc($get_IPT);
    $getMAX_IPT_res = mysqli_fetch_assoc($getMAX_IPT);
    $get_IPT_res = mysqli_num_rows ($get_IPT); //3
    $get_MAX_no = $getMAX_IPT_res['max_ipt']; //5

    $lpr = 1;
    $arr = 0;
    while ($lpr <= $get_MAX_no){
        $exacts = mysqli_query($conn, "SELECT * FROM ipt_place_info WHERE IPTplace_id = '$lpr'");
        $res_exacts = mysqli_fetch_assoc($exacts);
        $exacts_COUNT = mysqli_num_rows($exacts);
        
//        $region_inArray = in_array($res_exacts['region'], $region);
//        $name_inArray = in_array($res_exacts['IPTplace_name'], $region); //Returns true if the value is in the array
        
        if ($exacts_COUNT != 0){
            $region[$arr] = $res_exacts['region'];
            $region[$arr+1] = $res_exacts['IPTplace_name'];
            
            $arr = $arr + 2;
        }
        
        $lpr = $lpr + 1;
    }

    $get_location = mysqli_query ($conn, "SELECT DISTINCT ipt_location FROM ipt_place_info");
    $get_location_res = mysqli_fetch_assoc($get_location);
//    print_r ($region);
//    echo $get_location_res['ipt_location'];

    if (isset($_POST['submitComment'])){
        //submit comment
        $maintenance = $_POST ['maintenance'];
        $networking = $_POST ['networking'];
        $programming = $_POST ['programming'];
        $comment = $_POST ['comment'];
        $company_id = $_POST ['company_id'];
        
        $insertComment = mysqli_query($conn, "INSERT INTO comment_info (information, maintenance, networking, programming, IPTplace_id) VALUES ('$comment', '$maintenance', '$networking', '$programming', '$company_id')");
        
        $max_Comment = mysqli_query($conn, "SELECT MAX(comment_id) AS max_comment FROM comment_info");
        
        $ipt_lp = 1;
        
        
        
//        header ('Location: ');
    }

//    submitComment
//    apply_toIPT
?>



<!--        <div id="content">-->
<div class="container">
    <form method="post" autocomplete="off">
     <div class="row mr-auto">
         
         
        <div class="ml-5 col-lg-5 ml-auto mt-3 autocomplete">
            <input id="search_term" class="form-control" rows="1" style="border: 2px solid #306FA0; resize:none; border-radius" placeholder="Enter a Search term (such as a Company)" name="search_term" required>
        </div>

        <div class="col-lg-3 mr-auto mt-3">
        <div class="row">
<select class="form-control col-lg-7" name="search_by" id="color_select" style="border: 2px solid #306FA0; font-size:14px;" required>
<option selected disabled hidden> Search by</option>
<option id="option_menu">Company Name</option>
<option>Region</option>
</select>
           
           
            <button type="submit" class="ml-3 btn btn-primary" id="searchIPT" style="font-size:15px;" name="search_btn"> Search </button>

            <style>
                #searchIPT {
                    background-color: #306FA0;
                }
            </style>
            </div>
        </div>
        
       
    </div> </form>
    <hr>
    
    
    
<!--    </div>-->
<!--    border: 2px solid rgba(48, 111, 160, 0.6); border-radius: 10px;   -->
    <?php
    if ((isset($_POST['search_btn'])) && (isset($_POST['search_by']))){
        $search_term = $_POST['search_term'];
        $search_by = $_POST['search_by'];
        
        
         //region or company name
//        echo $search_term;
//        echo $search_by;
        
        if ($search_by == 'Region'){
//            echo $search_by;
            $get_IPT_info = mysqli_query($conn, "SELECT * FROM ipt_place_info WHERE region = '$search_term'");
            $get_MAX_IPT_info = mysqli_query($conn, "SELECT MAX(IPTplace_id) AS max_iptid FROM ipt_place_info WHERE region = '$search_term'");
            $get_RES_IPT_info = mysqli_fetch_assoc($get_IPT_info);
            $get_RES_IPT_info_COUNT = mysqli_num_rows($get_IPT_info);
            $get_RESMAX_IPT_info = mysqli_fetch_assoc($get_MAX_IPT_info);
        }
        
        
        if ($search_by == 'Company Name'){
//            echo $search_by;
            $get_IPT_info = mysqli_query($conn, "SELECT * FROM ipt_place_info WHERE IPTplace_name = '$search_term'");
            $get_MAX_IPT_info = mysqli_query($conn, "SELECT MAX(IPTplace_id) AS max_iptid FROM ipt_place_info WHERE IPTplace_name = '$search_term'");
            $get_RES_IPT_info = mysqli_fetch_assoc($get_IPT_info);
            $get_RES_IPT_info_COUNT = mysqli_num_rows($get_IPT_info);
            $get_RESMAX_IPT_info = mysqli_fetch_assoc($get_MAX_IPT_info);
        }
        
        
        if ($get_RES_IPT_info_COUNT != 0){
        
        
        echo "
        <div class='row'>
    <div class='col-lg-11 ml-auto mr-auto'>
    <label style='font-size:14px;'>Search Term: <span style='color:red;'>".$search_term."</span></label>
    <label class='ml-lg-5' style='font-size:14px;'>Search By: <span style='color:red;'>".$search_by."</span></label>
    <label class='float-right' style='font-size:14px;'>Results found: <span style='color:red;'>".$get_RES_IPT_info_COUNT."</span></label>
    <div class='table-responsive' style='border: 1px solid #306FA0;'>
    <table class='table table-striped'>
        <thead>
            <tr style='background-color: #306FA0; color:white; font-size:14px;'>
                <th style='width: 5%'>SN</th>
                <th style='width: 10%'>COMPANY</th>
                <th style='width: 10%'>LOCATION</th>
                <th style='width: 20%'>REGION </th>
                <th class='text-center' style='width: 10%'>MAINTENANCE</th>
                <th class='text-center' style='width: 10%'>NETWORKING</th>
                <th class='text-center' style='width: 10%'>PROGRAMMING</th>
                <th class='text-center' style='width: 20%'>ACTION</th>
            </tr>
        </thead><tbody style='font-size: 13px;'>
        ";
//        echo $get_RESMAX_IPT_info['max_iptid'];
        
        
        $lp2 = 1;
        $sn = 1;
        while ($lp2 <= $get_RESMAX_IPT_info['max_iptid']){
            $getExact = mysqli_query ($conn, "SELECT * FROM ipt_place_info WHERE IPTplace_id = '$lp2' AND (region = '$search_term' OR IPTplace_name = '$search_term')");
            $getRes = mysqli_fetch_assoc($getExact);
            $COUNT_rows = mysqli_num_rows($getExact);
            
            if ($COUNT_rows != 0){ //result has been found
                echo "
                    <tr>
                    <td>".$sn."</td>
                    <td><a href='#' data-toggle='modal' data-target='#modal3-default".$getRes['IPTplace_id']."'>".$getRes['IPTplace_name']."<a</td>
                    
    <form method='post' style='font-size:14px;'>
    <div class='modal fade' id='modal3-default".$getRes['IPTplace_id']."' style='margin-top:10vh;'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header' style='background-color: #306FA0; color:white;'>
              <h5 class='modal-title'>COMMENTS FOR ".$getRes['IPTplace_name']."</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
              </button>
            </div>";
    
    $getMAX = mysqli_query($conn, "SELECT MAX(comment_id) AS max_comment FROM comment_info");
    $res_getMAX = mysqli_fetch_assoc($getMAX);
                
    $lp = 1;
    $count = 1;
    $ipt_id = $getRes['IPTplace_id'];
    while ($lp <= $res_getMAX['max_comment']){
        $get_cmt = mysqli_query($conn, "SELECT * FROM comment_info WHERE comment_id = '$lp' AND IPTplace_id='$ipt_id'");
        $res_cmt = mysqli_fetch_assoc($get_cmt);
        $countres_cmt = mysqli_num_rows($get_cmt);
        
        if ($countres_cmt != 0){
        echo "
        <div class='modal-body'>
        <table class='table'>
        <tr>
        <td>".$count."</td>
        <td>".$res_cmt['information']."</td>
        </tr>
        ";
            
        $count = $count + 1;
        }
        $lp = $lp + 1;
    }
    
    ?>
            
            
<!--            <div class='modal-body'>-->
                
            
            
        
                
    <?php
            echo "
            </table>
            </div>
            <div class='modal-footer justify-content-between'>
                <input type='hidden' name='company_id' value='".$getRes['IPTplace_id']."'>
              <button type='button' class='btn btn-primary' data-dismiss='modal' style='background-color: #306FA0; color:white;'><span style='font-size:14px;'>Close</span></button>

              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
                    
                    <td>".$getRes['ipt_location']."</td>
                    <td>".$getRes['region']."</td>
                    <td class='text-center'>".$getRes['maintenance']."</td>
                    <td class='text-center'>".$getRes['networking']."</td>
                    <td class='text-center'>".$getRes['programming']."</td>
                    <td class='text-center'>
                    <a href='#' class='btn btn-success' data-toggle='modal' data-target='#modal-default2".$getRes['IPTplace_id']."'><span style='font-size:13px;'>APPLY</span></a>
                    <a href='#' class='btn btn-dark' data-toggle='modal' data-target='#modal-default".$getRes['IPTplace_id']."'><span style='font-size:13px;'>REVIEW</span></a>
                        
        <form method='post' style='font-size:14px;'>
    <div class='modal fade' id='modal-default".$getRes['IPTplace_id']."'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header' style='background-color: #306FA0; color:white;'>
              <h5 class='modal-title'>REVIEW</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                <div class='form-group'>
                <div class='row'>
                <div class='col col-md-5 mt-2'>
                <label class='float-left'>Company Name:</label>
                <input type='text' name='company_name' class='form-control' placeholder='' style='font-size:14px;' value='".$getRes['IPTplace_name']."'>
                </div>
                </div>
                </div>
            
            
                <div class='form-group'>
                  <div class='row'>
                    <div class='col col-md-3 mt-2'>
                      <label>Maintenance:</label>
                        <select class='form-control' name='maintenance' id='color_select' onclick='add_color('#007BFF')'>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
   
                    <div class='col col-md-3 ml-auto mr-auto mt-2'>
                      <label>Networking:</label>
                        <select class='form-control' name='networking'>
                          <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                    
                    <div class='col col-md-3 ml-auto mt-2'>
                      <label>Programming:</label>
                        <select class='form-control' name='programming'>
                          <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                  </div>
                </div>
                
                <div class='form-group'>
                  <div class='row'>
                    <div class='col col-md-12 mt-2'>
                      <label class='float-left'>Comment:</label>
                      <textarea name='comment' class='form-control' placeholder='Comment' rows='7' style='font-size:14px; resize:none;' required></textarea>
                    </div>
                </div>  
                </div>
                     
            </div>
            <div class='modal-footer justify-content-between'>
                <input type='hidden' name='company_id' value='".$getRes['IPTplace_id']."'>
              <button type='button' class='btn btn-primary' data-dismiss='modal' style='background-color: #306FA0; color:white;'><span style='font-size:14px;'>Close</span></button>

              <button type='submit' name='submitComment' class='btn btn-primary' style='background-color: #306FA0; color:white;'><span style='font-size:14px;'>SUBMIT</span></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
    
    <form method='post' style='font-size:14px;'>
    <div class='modal fade mt-5' id='modal-default2".$getRes['IPTplace_id']."'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header' style='background-color: #28A745; color:white;'>
              <h5 class='modal-title'>APPLY TO IPT PLACE</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                <div class='form-group'>
                <p class='float-left text-dark' style='font-weight:bold;'> Send Application to <span class='text-danger'>".$getRes['IPTplace_name']."</span>?</p>
                </div>
       
            </div>
            <div class='modal-footer justify-content-between'>
                <input type='hidden' name='company_id' value='".$getRes['IPTplace_id']."'>
              <button type='button' class='btn btn-success' data-dismiss='modal' style='color:white;'><span style='font-size:14px;'>Close</span></button>

              <button type='submit' name='apply_toIPT' data-dismiss='modal' class='btn btn-success' style='color:white;'><span style='font-size:14px;'>APPLY</span></button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
    </td>
    </tr>
";
                
                $sn = $sn + 1;
            }
            
            $lp2 = $lp2 + 1;
        }
    }else{
        echo "
        <label style='font-size:14px;'>Search Term: <span style='color:red;'>".$search_term."</span></label>
    <label class='ml-lg-5' style='font-size:14px;'>Search By: <span style='color:red;'>".$search_by."</span></label>
    <br/><hr>
        <p class='' style='color:red; font-weight:400;'> No matches found </p>";
            
        }
    }
    
    
    ?>
    
        </tbody>
        </table>
    </div>
    </div>
    </div>
    <style>
        * { box-sizing: border-box; }
body {
  font: 16px ;
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}
        
div #place_style{
    font-size:14px;
    color: #5d5d5d;
}        

div #place_style:hover{
    opacity: 0.8;
/*            font-size: 3px;*/
/*            background-color: #EEEEEE;*/
    color: #4C4C4C;
/*            color: #306FA0;*/
/*            box-shadow: none;*/
    box-shadow: 0 0 0 transparent;
    cursor:pointer;
/*            text-decoration: underline;*/
/*            background-color: #000000;*/
}

#apply_btn:hover{
/*            opacity: 0.9;*/
    background-color: red;
}
        
</style>
    
    <script src="../../js/jquery.min.js"></script>  
<script>
    $(function () {
            
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}
        
var region = <?php echo json_encode($region); ?>;

autocomplete(document.getElementById("search_term"), region);
//autocomplete(document.getElementById("search_term"), location);

//alert (location);
        
})
    
    


    

</script>
   
   
    <script>
//        function applyBtn(){
//            document.getElementById('apply_btn').style.backgroundColor = "Green";
//            
//        }
        
        
        function co_page(){
//            location.href='../main/index.php';   
        }
    </script>

</div>

<!--    Content of this page go in here-->

<!--        </div>-->
<!--    </div>-->
<!--    div end for id = "wrapper"  -->
    <div class="overlay"></div>



<?php
    include '../phpIncludes/footer2.php';


?>
<!--
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
-->

    
    </body>
</html>
