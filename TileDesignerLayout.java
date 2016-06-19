/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tiledesigner;

/**
 *
 * @author Surya
 */
import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JPanel;
import javax.swing.JToolBar;


class TileDesignerLayout extends JPanel{
    
    JButton patch1;
    JButton patch2;
    JButton patch3;
    JButton patch4;
    JButton patch5;
    JButton resetBtn;
    
    public TileDesignerLayout(){
        setLayout(new BorderLayout());
        
        TileCanvas ptr1 = new TileCanvas(); 
        ptr1.ResetGridTile(); 
        ptr1.LoadImageArray(); //Load images into Array
        ptr1.createMouseListener(); //Add mouse listener to grid panel
        add(ptr1, BorderLayout.CENTER); //Adding centerPanel to OuterFrame
        
        JPanel resetPanel = new JPanel(); // create panel for reset button
        resetPanel.setLayout(new FlowLayout()); // set layout of resetPanel
        resetBtn = new JButton("Reset"); // make reset button 
        resetPanel.add(resetBtn); //add reset button to panel
        resetBtn.addActionListener(new ActionListener(){ //add listener to resetbutton
            public void actionPerformed(ActionEvent e){
                ptr1.ResetGridTile(); //reset tile2dArray
                ptr1.repaint(); //repaint so we clear the grid
            }
        });
        add(resetPanel,BorderLayout.SOUTH); //Add reset panel to the frame
        
        JToolBar tileToolBar = new JToolBar(); //create enw toolbar
        
        // create Buttons for toolbar with graphics on them
        patch1 = new JButton(new ImageIcon(ptr1.nextimage[0]));
        patch2 = new JButton(new ImageIcon(ptr1.nextimage[1]));
        patch3 = new JButton(new ImageIcon(ptr1.nextimage[2]));
        patch4 = new JButton(new ImageIcon(ptr1.nextimage[3]));
        patch5 = new JButton(new ImageIcon(ptr1.nextimage[4]));
        
        //add all those buttons to the toolbar
        tileToolBar.add(patch1);
        tileToolBar.add(patch2);
        tileToolBar.add(patch3);
        tileToolBar.add(patch4);
        tileToolBar.add(patch5);
        
        //add the toolbar to frame
        add(tileToolBar, BorderLayout.NORTH);
        
        //Add Action Listeners to the toolbar Buttons
        patch1.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e){
                ptr1.selectedTile = 0; //set selected tile to index 0
            }
        });
        patch2.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e){
                ptr1.selectedTile = 1;//set selected tile to index 1
            }
        });
        patch3.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e){
                ptr1.selectedTile = 2;//set selected tile to index 2
            }
        });
        patch4.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e){
                ptr1.selectedTile = 3;//set selected tile to index 3
            }
        });
        patch5.addActionListener(new ActionListener(){
            public void actionPerformed(ActionEvent e){
                ptr1.selectedTile = 4;//set selected tile to index 4
            }
        });
    }
      
}
