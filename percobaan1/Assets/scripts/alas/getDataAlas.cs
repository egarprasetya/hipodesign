﻿using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class getDataAlas : MonoBehaviour
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
	public Text nama3;
	public Text kelebihan3;
	public Text kekurangan3;
    // Use this for initialization
    IEnumerator Start()
	{
    WWW itemsDataAlas = new WWW("http://localhost/hidroponik/php/getDataAlas.php");
    yield return itemsDataAlas;
    string dataAlas = itemsDataAlas.text;
    print(dataAlas);
    items = dataAlas.Split(';');
    
        nama1.text = items[0];
		kelebihan1.text = items[1];
		
		nama2.text = items[2];
		kelebihan2.text = items[3];
		
		nama3.text = items[4];
		kelebihan3.text = items[5];
		

    }

}
