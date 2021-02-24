(function() {
    var datepicker_options, inputmask_options;
  
    datepicker_options = {
      altFormat: "dd-mm-yyyy",
      // appendText: "(dd/mm/yyyy)"
      dateFormat: "dd-mm-yyyy",
      // defaultDate: +1
      yearRange: "1000:3000",
      changeMonth: true,
      changeYear: true
    };
  
    inputmask_options = {
      mask: "99-99-9999",
      alias: "date",
      placeholder: "dd-mm-yyyy",
      insertMode: false
    };
  
    
    // 1
    $("#datepicker").datepicker(datepicker_options);
  
    $("#inputmask").inputmask("99-99-9999", inputmask_options);
  
    $("#datemask").inputmask({
      // alias: "date", 
      // insertMode: "true",
      yearrange: {
        minyear: 1000,
        maxyear: 3000
      }
    });
  
    $("#datemask").datepicker(datepicker_options);
  
    $("#datemask2").inputmask("99-99-9999", inputmask_options);
  
    $("#datemask2").datepicker(datepicker_options);
  
  }).call(this);
  
  //# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQSxNQUFBLGtCQUFBLEVBQUE7O0VBQUEsa0JBQUEsR0FDRTtJQUFBLFNBQUEsRUFBVyxZQUFYOztJQUVBLFVBQUEsRUFBWSxZQUZaOztJQUlBLFNBQUEsRUFBVyxXQUpYO0lBS0EsV0FBQSxFQUFhLElBTGI7SUFNQSxVQUFBLEVBQVk7RUFOWjs7RUFRRixpQkFBQSxHQUNFO0lBQUEsSUFBQSxFQUFNLFlBQU47SUFDQSxLQUFBLEVBQU8sTUFEUDtJQUVBLFdBQUEsRUFBYSxZQUZiO0lBR0EsVUFBQSxFQUFZO0VBSFosRUFWRjs7OztFQWlCQSxDQUFBLENBQUUsYUFBRixDQUFnQixDQUFDLFVBQWpCLENBQTRCLGtCQUE1Qjs7RUFHQSxDQUFBLENBQUUsWUFBRixDQUFlLENBQUMsU0FBaEIsQ0FBMEIsWUFBMUIsRUFBd0MsaUJBQXhDOztFQUdBLENBQUEsQ0FBRSxXQUFGLENBQWMsQ0FBQyxTQUFmLENBR0UsQ0FBQTs7O0lBQUEsU0FBQSxFQUFXO01BQUUsT0FBQSxFQUFTLElBQVg7TUFBaUIsT0FBQSxFQUFTO0lBQTFCO0VBQVgsQ0FIRjs7RUFLQSxDQUFBLENBQUUsV0FBRixDQUFjLENBQUMsVUFBZixDQUEwQixrQkFBMUI7O0VBR0EsQ0FBQSxDQUFFLFlBQUYsQ0FBZSxDQUFDLFNBQWhCLENBQTBCLFlBQTFCLEVBQXdDLGlCQUF4Qzs7RUFDQSxDQUFBLENBQUUsWUFBRixDQUFlLENBQUMsVUFBaEIsQ0FBMkIsa0JBQTNCO0FBaENBIiwic291cmNlc0NvbnRlbnQiOlsiZGF0ZXBpY2tlcl9vcHRpb25zID0gXG4gIGFsdEZvcm1hdDogXCJkZC1tbS15eXl5XCJcbiAgIyBhcHBlbmRUZXh0OiBcIihkZC9tbS95eXl5KVwiXG4gIGRhdGVGb3JtYXQ6IFwiZGQtbW0teXl5eVwiXG4gICMgZGVmYXVsdERhdGU6ICsxXG4gIHllYXJSYW5nZTogXCIxMDAwOjMwMDBcIlxuICBjaGFuZ2VNb250aDogdHJ1ZSBcbiAgY2hhbmdlWWVhcjogdHJ1ZVxuXG5pbnB1dG1hc2tfb3B0aW9ucyA9IFxuICBtYXNrOiBcIjk5LTk5LTk5OTlcIlxuICBhbGlhczogXCJkYXRlXCJcbiAgcGxhY2Vob2xkZXI6IFwiZGQtbW0teXl5eVwiXG4gIGluc2VydE1vZGU6IGZhbHNlXG4gICAgXG4gICAgXG4jIDFcbiQoXCIjZGF0ZXBpY2tlclwiKS5kYXRlcGlja2VyKGRhdGVwaWNrZXJfb3B0aW9ucyk7XG5cbiMgMlxuJChcIiNpbnB1dG1hc2tcIikuaW5wdXRtYXNrKFwiOTktOTktOTk5OVwiLCBpbnB1dG1hc2tfb3B0aW9ucyk7XG5cbiMgM1xuJChcIiNkYXRlbWFza1wiKS5pbnB1dG1hc2soXG4gICMgYWxpYXM6IFwiZGF0ZVwiLCBcbiAgIyBpbnNlcnRNb2RlOiBcInRydWVcIixcbiAgeWVhcnJhbmdlOiB7IG1pbnllYXI6IDEwMDAsIG1heHllYXI6IDMwMDB9XG4pOyBcbiQoXCIjZGF0ZW1hc2tcIikuZGF0ZXBpY2tlcihkYXRlcGlja2VyX29wdGlvbnMpO1xuXG4jIDRcbiQoXCIjZGF0ZW1hc2syXCIpLmlucHV0bWFzayhcIjk5LTk5LTk5OTlcIiwgaW5wdXRtYXNrX29wdGlvbnMpOyBcbiQoXCIjZGF0ZW1hc2syXCIpLmRhdGVwaWNrZXIoZGF0ZXBpY2tlcl9vcHRpb25zKTtcblxuIl19
  //# sourceURL=coffeescript