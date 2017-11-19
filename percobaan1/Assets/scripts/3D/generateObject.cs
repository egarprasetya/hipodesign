using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System;
using System.Linq;


//https://www.youtube.com/watch?v=_S0xFbW2UdQ
public class generateObject : MonoBehaviour {

	//public GameObject cubeOneObject;
	//private getDataLuas otherScriptToAccess;
	public string[] items;
	
    public Material[] materials;//memberikan fungsi buat render
    //public Renderer rend;//benda yg perlu d render
    public int index;
    
	int getMediaTanam;
	int getAlas;
	int getModel;
	
	int lebar;
	int panjang;
	int []petak;
	
	int banyakPipa;
	int panjangPipa;
	int lajur;
	int jalanLebar=-50;
	int jalanPanjang=-400;
	int sisaPipa;
	int jarakY;
	int tambahanPipa;
	int banyakmediaNetpot=20;
	float jarakLubang=0;
	float tinggiNetpot;
	float perubahanJarakNetpot=17.5f;
	
	
	
	
	// Update is called once per frame
	IEnumerator Start () {
		WWW itemsData = new WWW("http://localhost/hidroponik/php/getDataDesign.php");
		yield return itemsData;
		string dataMediaTanam = itemsData.text;
		print(dataMediaTanam);
		items = dataMediaTanam.Split(';');
		print(items[0]+"          "+items[1]+"          "+items[2]+"          "+items[3]+"          "+items[4]+"          ");
        getMediaTanam = int.Parse(items[0]);
		getAlas = int.Parse(items[1]);
		getModel = int.Parse(items[2]);
		panjang = int.Parse(items[3]);
		lebar = int.Parse(items[4]);
		
		
		//mengecek tinggi netpot
		if(getAlas==1){
			tinggiNetpot=23;
		}else{
			tinggiNetpot=21;
		}
		
		//
		if(panjang%4==3||panjang%4==2||panjang%4==1){
			tambahanPipa=1;
		}
		
		//
		banyakPipa=lebar*5*((panjang/4)+tambahanPipa);
	
		//alas
		GameObject[] alas= new GameObject[banyakPipa];
		GameObject[] kaki= new GameObject[banyakPipa*3];
		GameObject[] output= new GameObject[banyakPipa];
		GameObject[] input= new GameObject[banyakPipa];
		GameObject [,]mediaNetpot= new GameObject[banyakPipa,20];
		GameObject [,]netpot= new GameObject[banyakPipa,20];
		sisaPipa=banyakPipa;
		if(getModel==1){
			for(int i=0;i<banyakPipa;i++){
				if(i%(lebar*5)==0){
					jalanLebar=-(i*10)-50;
					jalanPanjang+=400;
					print(jalanPanjang);
					print(jalanLebar);
				}
				if(i%5==0){
					jalanLebar+=50;
				}
				if(sisaPipa<=(lebar*5)){
					if(panjang%4==3){
						panjangPipa=130;
						banyakmediaNetpot=15;
						perubahanJarakNetpot= 17.5f;
					}
					if(panjang%4==2){
						panjangPipa=80;
						banyakmediaNetpot=10;
						perubahanJarakNetpot= 16;
					}
					if(panjang%4==1){
						panjangPipa=30;
						banyakmediaNetpot=5;
						perubahanJarakNetpot= 11f;
					}
				}
				else{
					panjangPipa=180;
				}

				if(getAlas==1){
					GameObject benda = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
					benda.transform.localScale = new Vector3(10,panjangPipa,10);
					benda.transform.position = new Vector3(jalanPanjang+(panjangPipa), 20, ((i)*10)+(jalanLebar));
					benda.transform.Rotate(90,0,90);
					benda.GetComponent<Renderer>().material.color = Color.grey;
					alas[i]=benda;
				}
				if(getAlas==2){
					GameObject benda = GameObject.CreatePrimitive(PrimitiveType.Cube);
					benda.transform.localScale = new Vector3(10,panjangPipa*2,5);
					benda.transform.position = new Vector3(jalanPanjang+(panjangPipa), 20, ((i)*10)+(jalanLebar));
					benda.transform.Rotate(90,0,90);
					benda.GetComponent<Renderer>().material.color = Color.grey;
					alas[i]=benda;
				}
				
				
				//kaki
				GameObject benda1 = GameObject.CreatePrimitive(PrimitiveType.Cube);
				benda1.transform.position = new Vector3(10+jalanPanjang, 10, ((i)*10)+(jalanLebar));
				benda1.transform.localScale = new Vector3(5,20,5);
				benda1.transform.Rotate(0,0,0);
				GameObject benda2 = GameObject.CreatePrimitive(PrimitiveType.Cube);
				benda2.transform.position = new Vector3((panjangPipa)+jalanPanjang, 10, ((i)*10)+(jalanLebar));
				benda2.transform.localScale = new Vector3(5,20,5);
				benda2.transform.Rotate(0,0,0);
				GameObject benda3 = GameObject.CreatePrimitive(PrimitiveType.Cube);
				benda3.transform.position = new Vector3((panjangPipa*2)+jalanPanjang-10, 10,((i)*10)+(jalanLebar));
				benda3.transform.localScale = new Vector3(5,20,5);
				benda3.transform.Rotate(0,0,0);
				//output
				GameObject benda4 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda4.transform.position = new Vector3((panjangPipa*2)+jalanPanjang-3, 10,((i)*10)+(jalanLebar));
				benda4.transform.localScale = new Vector3(5,10,5);
				benda4.transform.Rotate(0,0,0);
				//benda3.transform.Renderer=materials[index];
				
				
				//media + Netpot
				for(int j=0;j<banyakmediaNetpot;j++){
					//media
					GameObject benda8 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
					benda8.transform.position = new Vector3(jarakLubang+jalanPanjang+8, tinggiNetpot, ((i)*10)+(jalanLebar));
					benda8.transform.localScale = new Vector3(5,2,5);
					benda8.transform.Rotate(0,0,0);
					mediaNetpot[i,j]=benda8;
					//netpot
					GameObject benda9 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
					benda9.transform.position = new Vector3(jarakLubang+jalanPanjang+8, tinggiNetpot+0.01f, ((i)*10)+(jalanLebar));
					benda9.transform.localScale = new Vector3(4,2,4);
					benda9.transform.Rotate(0,0,0);
					mediaNetpot[i,j]=benda9;
					benda8.GetComponent<Renderer>().material.color = Color.black;
					
					jarakLubang+=perubahanJarakNetpot;
				}
				jarakLubang=0;
				
				
				
				benda1.GetComponent<Renderer>().material.color = Color.black;
				
				benda2.GetComponent<Renderer>().material.color = Color.black;
				benda3.GetComponent<Renderer>().material.color = Color.black;
				output[i]=benda4;
				kaki[i]=benda1;
				kaki[i+banyakPipa]=benda2;
				kaki[i+(banyakPipa*2)]=benda3;
				
				
				sisaPipa-=1;
			}

			jalanPanjang=-400;
			//pipa
			GameObject[] pipa= new GameObject[panjang/4*2];
			GameObject[] cagakPipa= new GameObject[panjang/4*3];
			for(int i=0;i<(panjang/4);i++){
				
				jalanPanjang+=400;
				
				GameObject benda = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda.transform.position = new Vector3(jalanPanjang+360-3, 0, lebar*50-10);
				benda.transform.localScale = new Vector3(5,lebar*50,5);
				benda.transform.Rotate(90,0,0);
				
				GameObject benda1 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda1.transform.position = new Vector3(jalanPanjang, 25, lebar*50);
				benda1.transform.localScale = new Vector3(5,lebar*50,5);
				benda1.transform.Rotate(90,0,0);
				
				GameObject benda2 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda2.transform.position = new Vector3((panjang*2)-3, 10, 70f+(i*30));
				benda2.transform.localScale = new Vector3(5,10,5);
				benda2.transform.Rotate(0,0,0);
				GameObject benda3 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda3.transform.position = new Vector3((panjang*2)-3, 10, 70f+(i*30));
				benda3.transform.localScale = new Vector3(5,10,5);
				benda3.transform.Rotate(0,0,0);
				GameObject benda4 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda4.transform.position = new Vector3((panjang*2)-3, 10, 70f+(i*30));
				benda4.transform.localScale = new Vector3(5,10,5);
				benda4.transform.Rotate(0,0,0);
				cagakPipa[i]=benda2;
				cagakPipa[i]=benda3;
				cagakPipa[i]=benda3;
				
				pipa[i]=benda;
				pipa[(panjang/4)+i]=benda1;
				
			}
		}
		
		
		
		//model 2
		if(getModel==2){
			for(int i=0;i<banyakPipa;i++){
				if(i%(lebar*5)==0){
					jalanLebar=-(i*10)-50;
					jalanPanjang+=400;
					print(jalanPanjang);
					print(jalanLebar);
				}
				if(i%5==0){
					jalanLebar+=50;
					jarakY=-10;
				}
				if(sisaPipa<=(lebar*5)){
					if(panjang%4==3){
						panjangPipa=130;
						banyakmediaNetpot=15;
						perubahanJarakNetpot= 17.5f;
					}
					if(panjang%4==2){
						panjangPipa=80;
						banyakmediaNetpot=10;
						perubahanJarakNetpot= 16;
					}
					if(panjang%4==1){
						panjangPipa=30;
						banyakmediaNetpot=5;
						perubahanJarakNetpot= 11f;
					}
				}
				else{
					panjangPipa=180;
				}
				

				if(getAlas==1){
					GameObject benda = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
					benda.transform.localScale = new Vector3(10,panjangPipa,10);
					benda.transform.position = new Vector3(jalanPanjang+(panjangPipa), 20+jarakY, ((i)*10)+(jalanLebar));
					benda.transform.Rotate(90,0,90);
					benda.GetComponent<Renderer>().material.color = Color.grey;
					alas[i]=benda;
				}
				if(getAlas==2){
					GameObject benda = GameObject.CreatePrimitive(PrimitiveType.Cube);
					benda.transform.localScale = new Vector3(10,panjangPipa*2,5);
					benda.transform.position = new Vector3(jalanPanjang+(panjangPipa), 20+jarakY, ((i)*10)+(jalanLebar));
					benda.transform.Rotate(90,0,90);
					benda.GetComponent<Renderer>().material.color = Color.grey;
					alas[i]=benda;
				}
				
				
				//kaki
				GameObject benda1 = GameObject.CreatePrimitive(PrimitiveType.Cube);
				benda1.transform.position = new Vector3(10+jalanPanjang, 10+(jarakY/2), ((i)*10)+(jalanLebar));
				benda1.transform.localScale = new Vector3(5,20+(jarakY),5);
				benda1.transform.Rotate(0,0,0);
				GameObject benda2 = GameObject.CreatePrimitive(PrimitiveType.Cube);
				benda2.transform.position = new Vector3((panjangPipa)+jalanPanjang, 10+(jarakY/2), ((i)*10)+(jalanLebar));
				benda2.transform.localScale = new Vector3(5,20+(jarakY),5);
				benda2.transform.Rotate(0,0,0);
				GameObject benda3 = GameObject.CreatePrimitive(PrimitiveType.Cube);
				benda3.transform.position = new Vector3((panjangPipa*2)+jalanPanjang-10, 10+(jarakY/2),((i)*10)+(jalanLebar));
				benda3.transform.localScale = new Vector3(5,20+(jarakY),5);
				benda3.transform.Rotate(0,0,0);
				//output
				GameObject benda4 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda4.transform.position = new Vector3((panjangPipa*2)+jalanPanjang-3, 10+(jarakY/2),((i)*10)+(jalanLebar));
				benda4.transform.localScale = new Vector3(5,10+(jarakY/2),5);
				benda4.transform.Rotate(0,0,0);
				//input
				GameObject benda6 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda6.transform.position = new Vector3(jalanPanjang-5, 10+(jarakY/2),((i)*10)+(jalanLebar));
				benda6.transform.localScale = new Vector3(5,10+(jarakY/2),5);
				benda6.transform.Rotate(0,0,0);
				
				//media + Netpot
				for(int j=0;j<banyakmediaNetpot;j++){
					//media
					GameObject benda8 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
					benda8.transform.position = new Vector3(jarakLubang+jalanPanjang+8, tinggiNetpot+(jarakY), ((i)*10)+(jalanLebar));
					benda8.transform.localScale = new Vector3(5,2,5);
					benda8.transform.Rotate(0,0,0);
					mediaNetpot[i,j]=benda8;
					//netpot
					GameObject benda9 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
					benda9.transform.position = new Vector3(jarakLubang+jalanPanjang+8, tinggiNetpot+0.01f+(jarakY), ((i)*10)+(jalanLebar));
					benda9.transform.localScale = new Vector3(4,2,4);
					benda9.transform.Rotate(0,0,0);
					mediaNetpot[i,j]=benda9;
					benda8.GetComponent<Renderer>().material.color = Color.black;
					
					jarakLubang+=perubahanJarakNetpot;
				}
				jarakLubang=0;
				
				//benda3.transform.Renderer=materials[index];
				benda1.GetComponent<Renderer>().material.color = Color.black;
				benda2.GetComponent<Renderer>().material.color = Color.black;
				benda3.GetComponent<Renderer>().material.color = Color.black;
				output[i]=benda4;
				input[i]=benda6;
				kaki[i]=benda1;
				kaki[i+banyakPipa]=benda2;
				kaki[i+(banyakPipa*2)]=benda3;

				jarakY+=10;
				
				sisaPipa-=1;
			}

			jalanPanjang=-400;
			//pipa
			GameObject[] pipa= new GameObject[panjang/4*2];
			GameObject[] cagakPipa= new GameObject[panjang/4*3];
			for(int i=0;i<(panjang/4);i++){
				
				jalanPanjang+=400;
				GameObject benda = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda.transform.position = new Vector3(jalanPanjang+360-3, 0, lebar*50-10);
				benda.transform.localScale = new Vector3(5,lebar*50,5);
				benda.transform.Rotate(90,0,0);
				
				GameObject benda1 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda1.transform.position = new Vector3(jalanPanjang-5, 2.5f, lebar*50);
				benda1.transform.localScale = new Vector3(5,lebar*50,5);
				benda1.transform.Rotate(90,0,0);
				
				GameObject benda2 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda2.transform.position = new Vector3((panjang*2)-3, 10, 70f+(i*30));
				benda2.transform.localScale = new Vector3(5,10,5);
				benda2.transform.Rotate(0,0,0);
				GameObject benda3 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda3.transform.position = new Vector3((panjang*2)-3, 10, 70f+(i*30));
				benda3.transform.localScale = new Vector3(5,10,5);
				benda3.transform.Rotate(0,0,0);
				GameObject benda4 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
				benda4.transform.position = new Vector3((panjang*2)-3, 10, 70f+(i*30));
				benda4.transform.localScale = new Vector3(5,10,5);
				benda4.transform.Rotate(0,0,0);
				
				benda1.GetComponent<Renderer>().material.color = Color.black;
				
				//cagakPipa[i]=benda2;
				//cagakPipa[i]=benda3;
				//cagakPipa[i]=benda4;
				
				
				pipa[i]=benda;
				pipa[(panjang/4)+i]=benda1;
				
			}

		}
		//output bawah
		GameObject benda5 = GameObject.CreatePrimitive(PrimitiveType.Cylinder);
		benda5.transform.localScale = new Vector3(10,panjang*50,10);
		benda5.transform.position = new Vector3(panjang*50, 0, -3);
		benda5.transform.Rotate(90,0,90);
		benda5.GetComponent<Renderer>().material.color = Color.grey;
		
	}  
}
