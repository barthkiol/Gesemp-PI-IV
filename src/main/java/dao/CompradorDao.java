package dao;

import java.sql.*;
import java.util.*;

import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.Query;

import Classes.Comprador;



public class CompradorDao {

	private Connection con = null; 
	
	public String salvar(Comprador comprador) throws Exception {
		//String retorno;
		try {
			EntityManager em = Conexao.getEntityManager();			
			em.getTransaction().begin();
			em.persist(comprador);
			em.getTransaction().commit();			
			return "Ok";
		} catch(Exception e) {
			throw new Exception("Erro gravando Comprador: "+e.getMessage());
		} 
					
	}
	// alterar
		public String alterar(Comprador comprador) throws Exception {
			try {			
				EntityManager em = Conexao.getEntityManager();			
				em.getTransaction().begin();
				em.merge(comprador);
				em.getTransaction().commit();			
				return "Ok";			
			} catch(Exception e) {
				throw new Exception("Erro gravando Comprador: "+e.getMessage());
			}		
		}
		
		// excluir
		public String deletar(Comprador comprador) throws Exception {
			try {
				EntityManager em = Conexao.getEntityManager();
				Comprador c = em.find(Comprador.class, comprador.getId());
				em.getTransaction().begin();
				em.remove(c);
				em.getTransaction().commit();			
				return "Ok";
			}catch(Exception e) {
				throw new Exception("Erro gravando  Comprador: " + e.getMessage());
			}		
		}	
		
		// consultar
		public List<Comprador> consultar() throws Exception{
			// criar uma var para lista
			EntityManager em = Conexao.getEntityManager();
			Query q = em.createQuery("from Comprador");
			return q.getResultList();				
		}
		
		public Comprador getComprador(Integer id) {

			 EntityManager em = Conexao.getEntityManager();
		      try {
		    	  Comprador comprador = (Comprador) em.createQuery("SELECT c from Comprador c where c.id = :id").setParameter("id", id).getSingleResult();
		      

		        return comprador;
		      } catch (NoResultException e) {
		            return null;
		      }
		    }
}
