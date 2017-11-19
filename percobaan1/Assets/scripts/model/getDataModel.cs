using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class getDataModel : MonoBehaviour
{ 
//mengambil data dari database
    public string[] items;
    
    
    //text yang berubah
    public Text nama1;
	public Text kelebihan1;
	public Text kekurangan1;
	public Text nama2;
	public Text kelebihan2;
	public Text kekurangan2;
	
    // Use this for initialization
    IEnumerator Start()
	{
    WWW itemsDataModel = new WWW("http://localhost/hidroponik/php/getDataModel.php");
    yield return itemsDataModel;
    string dataModel = itemsDataModel.text;
    print(dataModel);
    items = dataModel.Split(';');
    print("eror coy");
        nama1.text = items[0];
		kelebihan1.text = items[1];
		
		nama2.text = items[2];
		kelebihan2.text = items[3];
		
		

    }

}

