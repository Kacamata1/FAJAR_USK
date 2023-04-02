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
public class HitungTarifHotel extends Hotel {
    private int tarif;
    private String kamar;
    
    public int get_harga(){
        if(type == 1){
            if(waktu == 1 || waktu == 2){
                tarif = 100000;
            } else if(waktu == 3 || waktu == 4){
                tarif = 90000;
            } else {
                tarif = 80000;
            }
        } else if(type == 2){
            if(waktu == 1 || waktu == 2){
                tarif = 150000;
            } else if(waktu == 3 || waktu == 4){
                tarif = 135000;
            } else {
                tarif = 120000;
            }
        } else if(type == 3){
            if(waktu == 1 || waktu == 2){
                tarif = 2000000;
            } else if(waktu == 3 || waktu == 4){
                tarif = 180000;
            } else {
                tarif = 160000;
            }
        } else{
            
        }
        
        return tarif;
    }
    
    public String get_kamar(){
        if(type == 1){
            kamar = "Superior";
        } else if(type == 2){
            kamar = "Deluxe";
        } else if(type == 3){
            kamar = "Premium";
        } else{
            
        }
        
        return kamar;
    }
    
    public int get_total(){
        return tarif*waktu;
    }
}
