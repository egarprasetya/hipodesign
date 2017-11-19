using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class insertDataDesign : MonoBehaviour {

    public string inputIdMediaTanam;
    public string inputIdAlas;
    public string inputIdModel;
    public string inputPanjang;
    public string inputLebar;

    //link php untuk create
    string createDesignURL = "http://localhost/hipo/php/connectUser.php";
    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
        //menyimpan data dengan menekan spasi
        if (Input.GetKeyDown(KeyCode.Space)) CreateDataDesign(inputIdMediaTanam, inputIdAlas, inputIdModel, inputPanjang, inputLebar);
		
	}
    public void CreateDataDesign(string idMediaTanam, string idAlas, string idModel, string panjang, string lebar)
    {
        WWWForm form = new WWWForm();
        form.AddField("mediaTanamPost",idMediaTanam);
        form.AddField("alasPost",idAlas);
        form.AddField("modelPost",idModel);
        form.AddField("panjangPost", panjang);
        form.AddField("lebarPost", lebar);
        WWW www = new WWW(createDesignURL,form);
    }
}
