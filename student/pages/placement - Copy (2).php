<?php
    include '../phpIncludes/header.php';
    
    $get_IPT = mysqli_query ($conn, "SELECT * FROM ipt_place_info");
    $getMAX_IPT = mysqli_query ($conn, "SELECT MAX(IPTplace_id) AS max_ipt FROM ipt_place_info");
    $get_IPT_res = mysqli_fetch_assoc($get_IPT);
    $getMAX_IPT_res = mysqli_fetch_assoc($getMAX_IPT);
    $get_IPT_res = mysqli_num_rows ($get_IPT); //3
    $get_MAX_no = $getMAX_IPT_res['max_ipt']; //5

    $lp = 1;
    $arr = 0;
    while ($lp <= $get_MAX_no){
        $get_EXACT_IPT = mysqli_query ($conn, "SELECT * FROM ipt_place_info WHERE IPTplace_id = '$lp'");
        $get_EXACT_IPT_res = mysqli_fetch_assoc($get_EXACT_IPT);
        $get_EXACT_IPT_ROWS = mysqli_num_rows($get_EXACT_IPT);

//        echo $if_in_location;
        
        if ($get_EXACT_IPT_ROWS != 0){ //result has been found
            //STORE REGIONS AND LOCATION IN OUR DATABASE
            $region[$arr] = $get_EXACT_IPT_res['region'];
            $location[$arr] = $get_EXACT_IPT_res['ipt_location'];
            
            if ((in_array ($get_EXACT_IPT_res['region'], $region)) && ($arr > 0)){
//                print_r($region);
                unset($region[$arr]);
            }
            
            if (in_array ($get_EXACT_IPT_res['ipt_location'], $location)){
//                print_r($location);
                unset($location[$arr]);
            }
//            $if_in_location = in_array ($get_EXACT_IPT_res['ipt_location'], $location);
            $arr = $arr + 1;
        }
        
        $lp = $lp + 1;
    }
//    print_r ($location);


?>



<!--        <div id="content">-->
<div class="container">
    <form method="post" autocomplete="off">
     <div class="row mr-auto">
         
         
        <div class="ml-5 col-lg-5 ml-auto mt-3 autocomplete">
            <input id="search_term" class="form-control" rows="1" style="border: 2px solid #306FA0; resize:none; border-radius" placeholder="Enter a Search term (such as a Company)" name="search_term">
        </div>

        <div class="col-lg-3 mr-auto mt-3">
        <div class="row">
<select class="form-control col-lg-7" name="search_by" id="color_select" style="border: 2px solid #306FA0; font-size:14px;">
<option selected disabled> Search by</option>
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
    if (isset($_POST['search_btn'])){
        $search_term = $_POST['search_term'];
        $search_by = $_POST['search_by'];
        echo $search_term;
        echo $search_by;
        
    }
    
    ?>
    
    <style>
        * { box-sizing: border-box; }
body {
  font: 16px Arial;
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
//var location = <?php echo json_encode($location); ?>;

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
