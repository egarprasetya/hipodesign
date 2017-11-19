﻿using System.Collections;
using System.Collections.Generic;
using UnityEngine;


// https://www.youtube.com/watch?v=cfjLQrMGEb4
public class CameraController : MonoBehaviour {
    public float panSpeed = 20f;
    public float panBorderThickness = 10f;
    public Vector2 panLimit;
    public float scrollSpeed=20f;
    public float minY = 20f;
    public float maxY = 120f;

    void Update()
    {
        Vector3 pos = transform.position;
		
        if (Input.GetKey("w") || Input.mousePosition.y>= Screen.height-panBorderThickness)
        {
            pos.z += panSpeed * Time.deltaTime;
		
        }
        if (Input.GetKey("s") || Input.mousePosition.y <= panBorderThickness)
        {
            pos.z -= panSpeed * Time.deltaTime;
        }
        if (Input.GetKey("d") || Input.mousePosition.x >= Screen.width - panBorderThickness)
        {
            pos.x += panSpeed * Time.deltaTime;
        }
        if (Input.GetKey("a") || Input.mousePosition.x <= panBorderThickness)
        {
            pos.x -= panSpeed * Time.deltaTime;
        }

        float scroll = Input.GetAxis("Mouse ScrollWheel");
        pos.y -= scroll * scrollSpeed *100f* Time.deltaTime;
		
        //pos.x = Mathf.Clamp(pos.x,-panLimit.x -1000,panLimit.x+1000);
        //pos.y = Mathf.Clamp(pos.y, minY, maxY);
        //pos.z = Mathf.Clamp(pos.z, -panLimit.y-1000, panLimit.y+1000);
		transform.position=pos;
    }
    
}
