


<head>
    <!--Javascript Reference to Jquery-->
    <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    
    <!--Javascript Reference to Jquery Validator-->
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    
    <!--Javascript Reference to Jquery Validator-->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
</head>
<body>
<script type="text/javascript">
$(document).ready(function() {
  jQuery.validator.addMethod("notEqual", function(value, element, param) {
      return this.optional(element) || value != param;
  }, "Please choose some value!");

  $('#myForm').validate({
      rules: {
          text: {
              required: true
          },
          category: {
              required: true,
              notEqual: "---"
          }
      },
      messages: {
          text: {
              required: "Text required"
          },
          category: {
              required: "Category required"
          }
      }
  });
});
    </script>
<form id="myForm">
    <select id="category" name="category">
        <option value="---">---</option>
        <option value="---">Category 1</option>
        <option value="---">Category 2</option>
        <option value="---">Category 3</option>
    </select>
    <input type="text" id="text" name="text" />
    <input type="submit" value="Test" />
</form
</body>
</html>