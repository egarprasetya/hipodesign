using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class data : MonoBehaviour {
    //mengambil data dari database
    public string[] items;
	// Use this for initialization
	IEnumerator Start () {
        WWW itemsData = new WWW("http://localhost/hipo/php/HiPo.php");
        yield return itemsData;
        string dataMediaTanam = itemsData.text;
        print(dataMediaTanam);
        items = dataMediaTanam.Split(';');
        print(getData(items[0],"Name:"));
        print(getData(items[1], "Name:"));
    }
    //mengambil data dari database
    string getData(string data, string index)
    {
        string value = data.Substring(data.IndexOf(index) + index.Length);
        if (value.Contains("|")) value = value.Remove(value.IndexOf("|"));
        return value;
    }
}
