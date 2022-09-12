SELECT DISTINCT tp.tblproducto_NombreProducto, SUM(tv.tbl_venta_cantidad) as cantidad, SUM(ROUND (tv.tblventa_valorVenta)) as Total_venta FROM tblventa tv
											LEFT JOIN tblproducto tp
                                            ON tblventa_productoVendido = tp.ProId
                                            GROUP BY tp.tblproducto_NombreProducto
                                            ORDER BY Total_venta DESC