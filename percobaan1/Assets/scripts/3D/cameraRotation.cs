using System.Collections;
using System.Collections.Generic;
using UnityEngine;
//https://www.youtube.com/watch?v=_adEYoaArc4
public class cameraRotation : MonoBehaviour {


    private float mouseX;
    private float mouseY;
    private bool VerticalRotationEnabeled = true;
    private float VerticalRotationMin = 0f;
    private float VerticalRotationMax = 65f;
	int x,y,z;
	bool a=true,b=true,c=true,d=true,e=true;

    // Use this for initialization
   
	// Update is called once per frame
	void LateUpdate () {
        HandleMouseRotation();
        mouseX = Input.mousePosition.x;
        mouseY = Input.mousePosition.y;
    }
    public void HandleMouseRotation()
    {
        var easeFactor = 10f;
		
        //if(Input.GetMouseButton(1)&& Input.GetKey(KeyCode.LeftControl))
			
            if (Input.GetMouseButton(1))
            {
            //horizontal
            if(Input.mousePosition.x != mouseX)
            {
                var cameraRotationY = (Input.mousePosition.x - mouseX) * easeFactor * Time.deltaTime;
                this.transform.Rotate(0, cameraRotationY, 0);
            }

            //vertical
            if(VerticalRotationEnabeled&& Input.mousePosition.y != mouseY)
            {
                GameObject MainCamera = this.gameObject.transform.gameObject;
                var cameraRotationX = (mouseY - Input.mousePosition.y) * easeFactor * Time.deltaTime;
                var desiredRotationX = MainCamera.transform.eulerAngles.x + cameraRotationX;
                if (desiredRotationX >= VerticalRotationMin && desiredRotationX <= VerticalRotationMax)
                {
                    MainCamera.transform.Rotate(cameraRotationX, 0, 0);
                }
            }
			
        }
		
    }
}
