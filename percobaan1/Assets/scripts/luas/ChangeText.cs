using System.Collections;

using UnityEngine.UI;
using UnityEngine;


public class ChangeText : MonoBehaviour {
    
    public InputField panjang;// buat input text
    public InputField lebar;// buat input text
    public Text fText;

    public void getPanjangLebar()//method buat d ambil data
    {
        
        string getPanjang=panjang.text;
		string getLebar=lebar.text;
    }
}
