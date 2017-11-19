using System.Collections;

using UnityEngine.UI;
using UnityEngine;

public class getDataLuas : MonoBehaviour {

	public InputField panjang;// buat input text
    public InputField lebar;// buat input text
	string getPanjang;
	string getLebar;
	string createDesignURL = "http://localhost/hidroponik/php/insertDataDesignPanjangLebar.php";
    
	public void getPanjangLebar()//method buat d ambil data
    {
        
        getPanjang=panjang.text;
		getLebar=lebar.text;
    
        WWWForm form = new WWWForm();
        form.AddField("panjangPost", getPanjang);
        form.AddField("lebarPost", getLebar);
        WWW www = new WWW(createDesignURL,form);
}}