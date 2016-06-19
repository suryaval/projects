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
import java.awt.Graphics;
import java.awt.Image;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import javax.swing.JPanel;


class TileCanvas extends JPanel implements MouseListener{
    static final int square = 25; 
    int Rows=8; 
    int Col=8; 
    int[][] tilesArray = new int[Rows][Col]; 
    String[] ImageArray = {"pat1.gif","pat2.gif","pat3.gif","pat4.gif","pat5.gif","pat6.gif","pat7.gif","pat8.gif"};
    Image[] nextimage = new Image[8]; 
    Image[][] gif2dArray = new Image[Rows][Col]; 
    int grWidth = Col*square; 
    int grHeight = Rows * square; 
    int Xstart; 
    int Ystart; 
    int selectedTile = 0; 
    
    
    public void LoadImageArray()
    {
        for(int i=0; i<8; i++) 
        {
            nextimage[i] = getToolkit().getImage(ImageArray[i]); 
        }
    }
    
    
    public void ResetGridTile()
    {
        for(int i=0; i < Rows; i++) 
        {
            for(int j = 0; j < Col; j++) 
            {
                gif2dArray[i][j] = null; 
            }
        }
    }
    
    
    public void createMouseListener()  
    {
        addMouseListener(this); 
    }
    
    @Override
    public void paintComponent(Graphics g) 
    {
        super.paintComponent(g); 
        grWidth = Col*square; 
        grHeight = Rows*square; 
        int panelWidth = getWidth(); 
        int panelHeight = getHeight(); 
        Xstart = (panelWidth - grWidth)/2; 
        Ystart = (panelHeight - grHeight)/2; 
        
        
        for(int row = 0; row < Rows; row++)
        {
            for(int col = 0; col < Col; col++)
            {
                
                g.drawRect(Xstart+(square*row), Ystart+(square*col), square, square);
            }
        }
        
        
        for(int row = 0; row < Rows; row++)
        {
            for(int col = 0; col < Col; col++)
            {
                
                g.drawImage(gif2dArray[row][col],Xstart+(square*row), Ystart+(square*col), this);
            }
        }
    }

   
    @Override
    public void mousePressed(MouseEvent arg0) {
        int x = arg0.getX(); 
        int y = arg0.getY(); 
        
        if(x >= Xstart && x <=Xstart+grWidth && y >=Ystart && y <= Ystart + grHeight)
        {
            int xPos = (x-Xstart)/square; 
            int yPos = (y-Ystart)/square; 
            
            gif2dArray[xPos][yPos] = nextimage[selectedTile]; 
            this.repaint(); 
        }
    }
    
   
    @Override
    public void mouseClicked(MouseEvent e) {
    }
    
    @Override
    public void mouseReleased(MouseEvent e) {
    }

    @Override
    public void mouseEntered(MouseEvent e) {
    }

    @Override
    public void mouseExited(MouseEvent e) {
    }
}
