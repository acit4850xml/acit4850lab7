<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    
    <xsl:template match="/">
        <h1>Day Centric </h1>
        <table>
            <xsl:call-template name="Schedule"/>          
            <xsl:apply-templates select="/timetable/days"/>           
                      
        </table>
    </xsl:template>
    
    
    <!-- template to extract the days of the week -->
    <xsl:template name="Schedule">
        <table border="1">
            <tr bgcolor="#9acd32">
        
            <th>Days</th>
            <th width="100px">1</th>
            <th width="100px">2</th>
            <th width="100px">3</th>
            <th width="100px">4</th>
            <th width="100px">5</th>
            <th width="100px">6</th>
            <th width="100px">7</th>
            <th width="100px">8</th>
            <th width="100px">9</th>
            

               
        </tr>
        <xsl:for-each select="/timetable/days">
                <xsl:call-template name="day"/>
        </xsl:for-each>
        </table>
        
        
    </xsl:template>
    
    <xsl:template name="day">
        <tr>
            <td>
                <xsl:value-of select="./@type"/>
            </td>

            
            <td>
                
                <xsl:for-each select="./timeslots">
                    <xsl:if test="./timeslot/@type='1'">
                        
                        <xsl:value-of select="./course/@course"/>
                        <br/>
                        <xsl:value-of select="./course/room"/>
                        <br/>
                        <xsl:value-of select="./course/classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./course/instructor"/>  
                    </xsl:if>            
                </xsl:for-each> 
            </td>
            <td>
                <xsl:for-each select="./timeslots">
                    <xsl:if test="./@type='2'">
                        
                        <xsl:value-of select="./course/@course"/>
                        <br/>
                        <xsl:value-of select="./course/room"/>
                        <br/>
                        <xsl:value-of select="./course/classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./course/instructor"/>  
                    </xsl:if>            
                </xsl:for-each>  
            </td>
            <td>
                <xsl:for-each select="./timeslots">
                    <xsl:if test="./@type='3'">
                        
                        <xsl:value-of select="./course/@course"/>
                        <br/>
                        <xsl:value-of select="./course/room"/>
                        <br/>
                        <xsl:value-of select="./course/classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./course/instructor"/>  
                    </xsl:if>            
                </xsl:for-each> 
            </td>
            
            <td>
                <xsl:for-each select="./timeslots">
                    <xsl:if test="./@type='4'">
                        
                        <xsl:value-of select="./course/@course"/>
                        <br/>
                        <xsl:value-of select="./course/room"/>
                        <br/>
                        <xsl:value-of select="./course/classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./course/instructor"/>  
                    </xsl:if>            
                </xsl:for-each> 
            </td>
            
            <td>
                <xsl:for-each select="./timeslots">
                    <xsl:if test="./@type='5'">
                        
                        <xsl:value-of select="./course/@course"/>
                        <br/>
                        <xsl:value-of select="./course/room"/>
                        <br/>
                        <xsl:value-of select="./course/classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./course/instructor"/>  
                    </xsl:if>            
                </xsl:for-each>  
            </td>
            
            <td>
                <xsl:for-each select="./timeslots">
                    <xsl:if test="./@type='6'">
                        
                        <xsl:value-of select="./course/@course"/>
                        <br/>
                        <xsl:value-of select="./course/room"/>
                        <br/>
                        <xsl:value-of select="./course/classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./course/instructor"/>  
                    </xsl:if>            
                </xsl:for-each>  
            </td>
            <td>
                <xsl:for-each select="./timeslots">
                    <xsl:if test="./@type='7'">
                        
                        <xsl:value-of select="./course/@course"/>
                        <br/>
                        <xsl:value-of select="./course/room"/>
                        <br/>
                        <xsl:value-of select="./course/classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./course/instructor"/>  
                    </xsl:if>            
                </xsl:for-each>  
            </td>
            <td>
                <xsl:for-each select="./timeslots">
                    <xsl:if test="./@type='8'">
                        
                        <xsl:value-of select="./course/@course"/>
                        <br/>
                        <xsl:value-of select="./course/room"/>
                        <br/>
                        <xsl:value-of select="./course/classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./course/instructor"/>  
                    </xsl:if>            
                </xsl:for-each>  
            </td>
            <td>
                <xsl:for-each select="./timeslots">
                    <xsl:if test="./@type='9'">
                        
                        <xsl:value-of select="./course/@course"/>
                        <br/>
                        <xsl:value-of select="./course/room"/>
                        <br/>
                        <xsl:value-of select="./course/classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./course/instructor"/>  
                    </xsl:if>            
                </xsl:for-each>  
            </td>
            
        </tr>       
    </xsl:template> 


</xsl:stylesheet>