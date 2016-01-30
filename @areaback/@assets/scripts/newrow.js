//เพิ่มแถว
	function CreateNewRow()
	{
		var intLine = parseInt(document.frm.hdnMaxLine.value);
		intLine++;
        var intLine2 = intLine-1;
			
		var theTable = document.getElementById("tbExp");
		var newRow = theTable.insertRow(theTable.rows.length)
		newRow.id = newRow.uniqueID

		var newCell
		
		//*** Column No ***//
		newCell = newRow.insertCell(0);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "form-control");
		newCell.innerHTML = "<center>"+intLine2+"</center>";

		//*** Column varible name ***//
		newCell = newRow.insertCell(1);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "form-control");
        newCell.innerHTML=("<select name='var_id[]' class='form-control' id=\"var_id"+intLine2+"\"><?=implode("",$varible);?></select>");
        /*newCell.innerHTML=("<input  name='var_id[]' id=\"var_id"+intLine2+"\"  />");*/
        
        //*** Column desctext ***//
		newCell = newRow.insertCell(2);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "form-control");
        newCell.innerHTML=("<input name='desctext[]' class='form-control'  id=\"desctext"+intLine2+"\" />");
        
		newCell = newRow.insertCell(3);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "form-control");
		newCell.innerHTML = "<input type='hidden' name='hdnLine' value=\""+intLine+"\">";	
	
		document.frm.hdnMaxLine.value = intLine;
	}
	
	
	function RemoveRow()
	{
		intLine = parseInt(document.frm.hdnMaxLine.value);
		if(parseInt(intLine) > 1)
		{
				theTable = document.getElementById("tbExp");				
				theTableBody = theTable.tBodies[0];
				theTableBody.deleteRow(intLine);
				intLine--;
				document.frm.hdnMaxLine.value = intLine;
				
				//var pro_id = document.getElementById('prod_id_'+intLine).value;
				//window.location.href='action_saleorder.php?select=select_del_pro&pro='+pro_id;
			
		}
		
	}
	//ส่วนของ java เพิ่มแถวในตาราง

    
	