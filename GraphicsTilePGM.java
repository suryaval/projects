/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Surya
 */
package tiledesigner;

import java.awt.BorderLayout;
import java.awt.Dimension;
import javax.swing.JFrame;


public class GraphicsTilePGM extends JFrame{
    public static void createAndShowGUI() { //create and show the GUI
        GraphicsTilePGM frame = new GraphicsTilePGM(); //create new frame
        frame.setTitle("Assign-4");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); // set default close operation
        frame.pack();
        frame.setSize(new Dimension(300,300)); 
        frame.setVisible(true); //make it visible
    }
    
    public GraphicsTilePGM(){
        super();
        //call class to design the GUI
        TileDesignerLayout tiledesign = new TileDesignerLayout(); //create new Tile Designer
        setLayout(new BorderLayout()); //set Layout to BorderLayout
        add(tiledesign, BorderLayout.CENTER);// add tileDesignedr to Center
    }
}
