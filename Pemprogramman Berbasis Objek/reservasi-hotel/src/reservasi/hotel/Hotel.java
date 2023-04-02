/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package reservasi.hotel;

/**
 *
 * @author DELL
 */
public class Hotel {
   protected int type, waktu;
   
   public int getType()
   {
       return type;
   }
   
   public void SetType(int type){
       this.type = type;
   }
   
   public int getWaktu(){
       return waktu;
   }
   
   public void setWaktu(int waktu){
       this.waktu = waktu;
   }
}
