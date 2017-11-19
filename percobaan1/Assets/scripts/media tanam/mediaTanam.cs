using System.Collections;

using UnityEngine.UI;
using UnityEngine;


public class mediaTanam : MonoBehaviour {


    public string inputIdMediaTanam;
	string createDesignURL = "http://localhost/hidroponik/php/insertDataDesignMedia.php";
    
    public void getMediaTanam()
    {
        string mediaTanam = inputIdMediaTanam;

        WWWForm form = new WWWForm();
        print("Cek");
        form.AddField("mediaTanamPost",mediaTanam);
        
        WWW www = new WWW(createDesignURL,form);
    }

}
