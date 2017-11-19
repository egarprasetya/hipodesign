using System.Collections;

using UnityEngine.UI;
using UnityEngine;


public class model : MonoBehaviour {


   public string inputIdModel;
	string createDesignURL = "http://localhost/hidroponik/php/insertDataDesignModel.php";
    
    public void getModel()
    {
        string model = inputIdModel;
		
        WWWForm form = new WWWForm();
        form.AddField("modelPost",model);
        WWW www = new WWW(createDesignURL,form);
    }
}