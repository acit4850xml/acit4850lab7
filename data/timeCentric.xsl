<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    
    <xsl:template match="/">
        <h1>Time Centric </h1>
        <table>
            <xsl:call-template name="Schedule"/>          
            <xsl:apply-templates select="/timetable/timeslots"/>           
                      
        </table>
    </xsl:template>
    
    
    <!-- template to extract the days of the week -->
    <xsl:template name="Schedule">
        <table border="1">
            <tr bgcolor="#9acd32">
        
            <th>Timeslots</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
               
        </tr>
        <xsl:for-each select="/timetable/timeslots">
                <xsl:call-template name="time"/>
        </xsl:for-each>
        </table>
        
        
    </xsl:template>
    
    <xsl:template name="time">
        <tr>
            <td>
                <xsl:value-of select="./@type"/>
            </td>

            
            <td>
                <xsl:for-each select="./course">
                    <xsl:if test="./day/@type='Monday'">
                        
                        <xsl:value-of select="./@course"/>
                        <br/>
                        <xsl:value-of select="./room"/>
                        <br/>
                        <xsl:value-of select="./classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./instructor"/>  
                    </xsl:if>            
                </xsl:for-each> 
            </td>
            <td>
                <xsl:for-each select="./course">
                    <xsl:if test="./day/@type='Tuesday'">
                        <xsl:value-of select="./@course"/>
                        <br/>
                        <xsl:value-of select="./room"/>
                        <br/>
                        <xsl:value-of select="./classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./instructor"/>
                    </xsl:if>            
                </xsl:for-each>  
            </td>
            <td>
                <xsl:for-each select="./course">
                    <xsl:if test="./day/@type='Wednesday'">
                        <xsl:value-of select="./@course"/>
                        <br/>
                        <xsl:value-of select="./room"/>
                        <br/>
                        <xsl:value-of select="./classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./instructor"/>
                    </xsl:if>            
                </xsl:for-each> 
            </td>
            
            <td>
                <xsl:for-each select="./course">
                    <xsl:if test="./day/@type='Thursday'">
                        <xsl:value-of select="./@course"/>
                        <br/>
                        <xsl:value-of select="./room"/>
                        <br/>
                        <xsl:value-of select="./classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./instructor"/>
                    </xsl:if>            
                </xsl:for-each>
            </td>
            
            <td>
                <xsl:for-each select="./course">
                    <xsl:if test="./day/@type='Friday'">
                        <xsl:value-of select="./@course"/>
                        <br/>
                        <xsl:value-of select="./room"/>
                        <br/>
                        <xsl:value-of select="./classtype/@type"/>
                        <br/>
                        <xsl:value-of select="./instructor"/>
                    </xsl:if>            
                </xsl:for-each> 
            </td>
        
        </tr>       
    </xsl:template> 


</xsl:stylesheet>