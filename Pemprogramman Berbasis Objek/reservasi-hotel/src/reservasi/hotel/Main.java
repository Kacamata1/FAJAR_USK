/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package reservasi.hotel;

import java.util.Scanner;

/**
 *
 * @author DELL
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        int type, waktu;
        boolean looping = true;
        String lanjut;
        
        HitungTarifHotel hotel = new HitungTarifHotel();
        
        Scanner jawaban = new Scanner(System.in);
        
        while(looping == true)
        {
            System.out.println("|------------------------------------------------------------|");
            System.out.println("|                      Pilihan Type Kamar                    |");
            System.out.println("|------------------------------------------------------------|");
            System.out.println("|   Waktu    |    Superior   |     Deluxe    |    Premium    |");
            System.out.println("| 1 - 2 Hari | 100.000/night | 150.000/night | 200.000/night |");
            System.out.println("| 3 - 4 Hari |  90.000/night | 135.000/night | 180.000/night |");
            System.out.println("|  >= 5 Hari |  80.000/night | 120.000/night | 160.000/night |");
            System.out.println("|------------------------------------------------------------|");

            System.out.println("Pilih Jenis Kamar");
            System.out.println("1. Superior");
            System.out.println("2. Deluxe");
            System.out.println("3. Premium");

            Scanner pilih = new Scanner(System.in);
            System.out.print("Jenis Kamar Yang Dipilih : ");
            
            
            
            type = pilih.nextInt();

            if(type == 1 || type == 2 || type == 3){
                hotel.SetType(type);

                Scanner lama = new Scanner(System.in);
                System.out.print("Untuk Berapa Lama : ");

                waktu = lama.nextInt();

                hotel.setWaktu(waktu);

                System.out.println("================= Nota Pembayaran =================");
                System.out.println("Jenis Kamar       : " + hotel.get_kamar());
                System.out.println("Tarif Penginapan  : Rp." + hotel.get_harga());
                System.out.println("Lama Menginap     : " + waktu);
                System.out.println("Total Pembayaran  : Rp." + hotel.get_total());
                System.out.println("===================================================");

                System.out.println("Apakah Anda Ingin Memesam Lagi (Ya/Tidak)?");

                lanjut = jawaban.next();

                if(lanjut.equals("tidak")){
                    looping = false;
                }
            } else {
                System.out.println("\u001B[31m" + "Maaf Type Yang Anda Pilih Tidak Ada");
            }
        }
    }
    
}
