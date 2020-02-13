    function toggleSidebar(){
    document.getElementById("sidebar").classList.toggle('active');
        document.getElementByClassName("container").classList.toggle('active');
    }

    function calcSum() {
        let price = document.getElementsByName("selling_price")[0].value;
        let qty = document.getElementsByName("qty")[0].value;
        let total = price * qty;
        var peso = "₱ ";
        let price2 = document.getElementsByName("selling_price")[0].value;
        let myPrice = price2;
        let cash = document.getElementsByName("cash")[0].value;
        let change = cash - total;
        let change2 = total - cash;
        let qty2 = document.getElementsByName("qty")[0].value;
        let myQty = qty2;
        let cash2 = document.getElementsByName("cash")[0].value;
        let myCash = cash2;
        if((cash < 0) && (qty < 0))
            {
               document.getElementsByName("pricee")[0].value =peso+ myPrice;
               document.getElementsByName("quantity")[0].value =myQty;
               document.getElementsByName("cash2")[0].value =peso+ myCash;
               document.getElementsByName("total")[0].value ="₱ 0.00";
               document.getElementsByName("balance")[0].value ="₱ 0.00";
               document.getElementsByName("change")[0].value = "₱ 0.00";
            }
		else if((cash == 0) && (qty == 0))
			{
			   document.getElementsByName("pricee")[0].value =peso+ myPrice;
               document.getElementsByName("quantity")[0].value ="0";
               document.getElementsByName("cash2")[0].value ="₱ 0.00";
               document.getElementsByName("total")[0].value ="₱ 0.00";
               document.getElementsByName("balance")[0].value ="₱ 0.00";
               document.getElementsByName("change")[0].value = "₱ 0.00";
			}
		else if(cash == ""){
				document.getElementsByName("pricee")[0].value =peso+ myPrice;
               document.getElementsByName("quantity")[0].value =myQty;
               document.getElementsByName("cash2")[0].value ="₱ 0.00";
               document.getElementsByName("total")[0].value =peso+ total;
               document.getElementsByName("balance")[0].value ="₱ 0.00";
               document.getElementsByName("change")[0].value = "₱ 0.00";
		}
        else if(cash <= 0)
            {
               document.getElementsByName("pricee")[0].value =peso+ myPrice;
               document.getElementsByName("quantity")[0].value =myQty;
               document.getElementsByName("cash2")[0].value =peso+ myCash;
               document.getElementsByName("total")[0].value =peso+ total;
               document.getElementsByName("balance")[0].value =peso+ change2;
               document.getElementsByName("change")[0].value = "₱ 0.00";
            }
        else if(qty <= 0)
            {
               document.getElementsByName("pricee")[0].value =peso+ myPrice;
               document.getElementsByName("quantity")[0].value =myQty;
               document.getElementsByName("cash2")[0].value =peso+ myCash;
               document.getElementsByName("total")[0].value ="₱ 0.00";
               document.getElementsByName("balance")[0].value ="₱ 0.00";
               document.getElementsByName("change")[0].value = peso+ myCash;
            }
        else{
           document.getElementsByName("total")[0].value =peso+ total;
        if(cash == "" && cash == 0){
            document.getElementsByName("cash2")[0].value="₱ 0.00";
        }
        else{
            document.getElementsByName("cash2")[0].value=peso+ myCash;
        }
        if(qty2 == 0){
            document.getElementsByName("quantity")[0].value="0";
        }
        else if(qty2 < 0){
            document.getElementsByName("quantity")[0].value=myQty;
        }
        else{
            document.getElementsByName("quantity")[0].value=myQty;
        }
        document.getElementsByName("pricee")[0].value=peso+ myPrice;
        if(cash < total){
            document.getElementsByName("balance")[0].value=peso+ change2;
            document.getElementsByName("change")[0].value= "₱ 0.00";
        } else if(cash >= total){
            document.getElementsByName("change")[0].value=peso+ change;
            document.getElementsByName("balance")[0].value= "₱ 0.00";
        } else if(qty && cash == ""){
            document.getElementsByName("change")[0].value=  "₱ 0.00";
            document.getElementsByName("balance")[0].value= "₱ 0.00";
        }else if (qty && cash < 0){
            document.getElementsByName("change")[0].value=  "₱ 0.00";
            document.getElementsByName("balance")[0].value= "₱ 0.00";
        }
        }

    }
        $(function(){
            $('.chart').easyPieChart({
                barColor: '#17c2a4',
                lineWidth: 5,
                animate: 2000,
                scaleColor: false,
            })
        })

  function printpage() {
      var printButton = document.getElementById("printbtn");
      printButton.style.visibility = 'hidden';
      window.print()
      printButton.style.visibility = 'visible';
  }

  $(document).ready(function() {
    setInterval(timestamp, 1000);
});
