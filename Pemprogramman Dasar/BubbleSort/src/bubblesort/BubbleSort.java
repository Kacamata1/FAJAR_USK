/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package bubblesort;
import java.util.Scanner;
import java.util.ArrayList;
import java.util.Collections;

/**
 *
 * @author DELL
 */
public class BubbleSort {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        int jumlah, i, j, a, metode, total = 0, swap;
        
        int average;
        
        ArrayList <Integer> NilaiArray = new ArrayList<Integer>();
        
        Scanner scan = new Scanner(System.in);
        System.out.println("Masukan Tiga Buah Nilai");
        
        System.out.println("--------------------------------------------------");
        
        jumlah = 3;
        int angka[] = new int [jumlah];
        
        for(i=0; i<jumlah; i++)
        {
            System.out.print("Masukan Nilai Ke-" + (i+1) + ":");
            angka[i] = scan.nextInt();
            total += angka[i];
            NilaiArray.add(angka[i]);
        }
        
        for(i=0; i<(jumlah-1); i++)
        {
            for(j=0; j<jumlah-i-1; j++)
            {
                if(angka[j] > angka[j+1]){
                    swap = angka[j];
                    angka[j] = angka[j+1];
                    angka[j+1] = swap;
                }
            }
        }
        
        System.out.println("--------------------------------------------------");

        System.out.print("\nUrutan Nilai Ascending : ");
        for(i=0; i<jumlah; i++)
        {
            System.out.print(angka[i] + " ");
        }
        
        
        for(i=0; i<jumlah-1; i++)
        {
            for(j=0; j<jumlah-i-1; j++)
            {
                if(angka[j] < angka[j+1]) {
                    swap = angka[j];
                    angka[j] = angka[j+1];
                    angka[j+1] = swap;
                }
            }
        }
        
        System.out.print("\nUrutan Milai Descending : ");
        for(i=0; i<jumlah; i++)
        {
            System.out.print(angka[i] + " ");
        }
        
        average = (total / jumlah);

        int min = (int) Collections.min(NilaiArray);
        int max = (int) Collections.max(NilaiArray);
        
        System.out.println("\nNilai Max : " + max);
        System.out.println("Nilai Min : " + min);
        System.out.println("Nilai Rata - Rata : " + average);
        
        
    }
}
