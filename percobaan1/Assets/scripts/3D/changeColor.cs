using System.Collections;
using System.Collections.Generic;
using UnityEngine;
//https://www.youtube.com/watch?v=6zNHaLdVk80
public class changeColor : MonoBehaviour {

    public Material[] materials;//memberikan fungsi buat render
    public Renderer rend;//benda yg perlu d render
    public int index;
    

	// Use this for initialization
	void Start () {
        
        rend = GetComponent<Renderer>();
        rend.enabled = true;
        getWarna();
    }
	
	// Update is called once per frame
	void getWarna()
    {
        rend.sharedMaterial = materials[index];
    }	
}
