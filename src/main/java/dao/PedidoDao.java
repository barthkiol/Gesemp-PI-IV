package dao;

import java.sql.*;
import java.util.*;

import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.Query;

import Classes.Pedido;



public class PedidoDao {

	private Connection con = null; 
	
	public String salvar(Pedido pedido) throws Exception {
		//String retorno;
		try {
			EntityManager em = Conexao.getEntityManager();			
			em.getTransaction().begin();
			em.persist(pedido);
			em.getTransaction().commit();			
			return "Ok";
		} catch(Exception e) {
			throw new Exception("Erro gravando Pedido: "+e.getMessage());
		} 
					
	}
	// alterar
		public String alterar(Pedido pedido) throws Exception {
			try {			
				EntityManager em = Conexao.getEntityManager();			
				em.getTransaction().begin();
				em.merge(pedido);
				em.getTransaction().commit();			
				return "Ok";			
			} catch(Exception e) {
				throw new Exception("Erro gravando Pedido: "+e.getMessage());
			}		
		}
		
		// excluir
		public String deletar(Pedido pedido) throws Exception {
			try {
				EntityManager em = Conexao.getEntityManager();
				Pedido c = em.find(Pedido.class, pedido.getId());
				em.getTransaction().begin();
				em.remove(c);
				em.getTransaction().commit();			
				return "Ok";
			}catch(Exception e) {
				throw new Exception("Erro gravando  Pedido: " + e.getMessage());
			}		
		}	
		
		// consultar
		public List<Pedido> consultar() throws Exception{
			// criar uma var para lista
			EntityManager em = Conexao.getEntityManager();
			Query q = em.createQuery("from Pedido");
			return q.getResultList();				
		}
		
		public Pedido getPedido(Integer id) {

			 EntityManager em = Conexao.getEntityManager();
		      try {
		    	  Pedido pedido = (Pedido) em.createQuery("SELECT c from Pedido c where c.id = :id").setParameter("id", id).getSingleResult();
		      

		        return pedido;
		      } catch (NoResultException e) {
		            return null;
		      }
		    }
}
