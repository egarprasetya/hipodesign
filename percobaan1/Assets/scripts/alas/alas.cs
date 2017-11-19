using System.Collections;

using UnityEngine.UI;
using UnityEngine;


public class alas : MonoBehaviour {


    public string inputIdAlas;
	string createDesignURL = "http://localhost/hidroponik/php/insertDataDesignAlas.php";
    
    public void getAlas()
    {
        string alas = inputIdAlas;
	
        WWWForm form = new WWWForm();
        
        form.AddField("alasPost",alas);
        
        WWW www = new WWW(createDesignURL,form);
    }

}