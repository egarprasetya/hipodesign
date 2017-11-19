using System.Collections;
using System.Collections.Generic;
using UnityEngine.SceneManagement;
using UnityEngine.UI;
using UnityEngine;
using System.IO;

public class ChangeScene : MonoBehaviour {

    static int ikan = 0;
    //public Text countText;
    
    static string media;

    void Start()
    {
        cekText();
    }

    public void setTeksCoba(string kata)
    {
       
        media = kata;
    }

    public void ChangeScene1(int ChangeSceneTo)
    {
        SceneManager.LoadScene(ChangeSceneTo);
        ikan = ikan+ 1;
        cekText();
    }

    public void cekText()
    {
        //countText.text = "cek coy" + ikan.ToString();
    }
}

