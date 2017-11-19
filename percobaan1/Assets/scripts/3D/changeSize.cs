using System.Collections;
using System.Collections.Generic;
using UnityEngine;
//https://www.youtube.com/watch?v=e7I315b74HY
public class changeSize : MonoBehaviour {


    public float speed = 5f;
    Vector3 temp;

	// Use this for initialization
	void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
        temp = transform.localScale;
        temp.y = 100;
        transform.localScale = temp;
	}
}
